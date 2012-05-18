/**
 * BeatRock - Servidor de CHAT para BeatRock.
 *
 * InfoSmart. Todos los derechos reservados.
 * Copyright 2012 - Iván Bravo Bravo.
 * http://beatrock.infosmart.mx/ - http://nodejs.org/ - http://socket.io/
**/

var Port = 1797;
var Serv = null;
var Socks = null;

var Host = "http://localhost/inchat";
var XMLHttpRequest = require("XMLHttpRequest").XMLHttpRequest;

var rSocks = {};

var Users = {};
var Rooms = {};
var SetRooms = {};
var OnRooms = {};

var U = 0;
var N = 0;

var Tp = 90000;
var Rp = 3000;

WriteLog("Preparando conexión...");

Serv = require("socket.io").listen(Port);
Socks = Serv.sockets;

WriteLog("Escuchando conexiones entrantes desde el puerto " + Port);
WriteLog("SERVIDOR INICIADO");

Serv.set('log level', 1);

Socks.on("connection", Connection);
Socks.on("disconnect", Crash);
Socks.on("error", Error);

setInterval(Ping, Tp);
setInterval(PingRooms, Rp);

setInterval(function() { Post('/sys-api/setCount.php', {'online': Count()}); }, 5000);
Post('/sys-api/setCount.php', {'online': '0'});

function WriteLog(message)
{
	var d = new Date();
	var n = d.getDay() + "-" + (d.getMonth() + 1) + "-" + d.getFullYear() + " " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();

	console.log("[" + n + "] - " + message);
}

function WriteError(e)
{
	console.log(">> ¡ERROR! " + e);
}

function Connection(Sock)
{
	U++;
	WriteLog("NUEVA CONEXIÓN ENTRANTE #" + U);

	rSocks[Sock.id] = Sock;
	setTimeout(function() { Sock.emit("defineSock", Sock.id) }, 500);
	
	Actions(Sock);
}

function Crash()
{
	SendAll("Servidor desconectado ¡Adios!");
}

function Error(e)
{
	WriteLog("Ha ocurrido un error: - " + e);
}

function Actions(Sock)
{	
	
	Sock.on("Welcome", Welcome);
	Sock.on("sendMessage", SendMessage);
	Sock.on("updateUser", UpdateUser);
	Sock.on("sendCommand", Command);
}

/* Funciones - Usuarios */

function Welcome(data)
{
	try
	{
		Post("/sys-api/getUser.php", {"userId": data.Id}, function(result)
		{
			if(result == "NOT_FOUND")
				return;
				
			Users[data.Id] = result;
			Users[data.Id]['roomID'] = data.roomID;
			Users[data.Id]['sockID'] = data.sockID;
			
			PrepareRoom(data.roomID, data.settings);
			AddUser2Room(data.Id, data.roomID);
		}, "JSON");
	}
	catch(e) { WriteError(e); }
}

function UpdateUser(userId)
{
	try
	{
		Post("/sys-api/getUser.php", {"userId": userId}, function(result)
		{
			if(result == "NOT_FOUND")
				return;
				
			var roomID = Users[userId]['roomID'];
			var sockID = Users[userId]['sockID'];
				
			Users[userId] = result;
			Users[userId]['roomID'] = roomID;
			Users[userId]['sockID'] = sockID;
			
			var Room = Rooms[roomID];
		
			if(Room == undefined || Room == null)
				return;
				
			Rooms[roomID][userId] = Users[userId];		
			SendList(roomID);
			
		}, "JSON");
	}
	catch(e) { WriteError(e); }
}

function SendMessage(data)
{
	if(data.userID == "" || Users[data.userID] == undefined || data.roomID == "" || data.roomID == undefined)
		return;
		
	if(data.message == "" || data.message == undefined)
		return;
	
	try
	{
		var Settings = null;
		
		if(SetRooms[data.roomID].options == undefined)
			Settings = SetRooms[data.roomID];
		else
			Settings = Json_decode(SetRooms[data.roomID].options);
			
		Post('/sys-api/filterMessage.php', {
			'message': data.message,
			'wordsfilter': Settings.wordsfilter,
			'smilies': Settings.smilies,
			'bbc': Settings.bbc
		}, function(res) {
			SendMessageRoom(res, data.userID, data.roomID);
		});
	}
	catch(e) { WriteError(e); }
}

function SendAll(data)
{
	Socks.emit("sendData", data);
}

function SendID(id, data)
{
	if(Users[id] == undefined || Users[id] == null)
		return;
		
	var sockID = Users[id].sockID;
	Send(sockID, data);
}

function Send(id, data)
{	
	var Sock = rSocks[id]
	
	if(Sock == undefined || Sock == null)
		return;
	
	Sock.emit("sendData", data);
}

/* Funciones - Usuarios - Acciones */

function Command(data)
{
	if(data.hash == undefined || data.hash == null)
		return;
		
	Post('/sys-api/havePerms.php', {
		'userHash': data.hash,
		'roomId': data.roomId
	}, function(res) {
		if(res == "OK")
			ExecCommand(data);
	});
}

function ExecCommand(data)
{	
	if(data.type == "kick")
		KickUser(data);
}

function KickUser(data)
{
	Room = Rooms[data.roomId];
		
	if(Room == undefined || Room == null || Room[data.value.userId] == undefined)
		return;
			
	dataa = {
		"type": "disconnect",
		"reason": "kick"
	};
		
	SendID(data.value.userId, dataa);
		
	setTimeout(function() {
		SendSystemMessageRoom(Users[data.value.userId].username + " ha sido expulsado de la sala.", data.roomId);
	}, 900);
		
	RemoveUser2Room(data.value.userId, data.roomId);
	SendList(data.roomId);
}

/* Funciones - Salas */

function PrepareRoom(id, settings)
{
	if(Rooms[id] != undefined && Rooms[id] != null)
		return;
	
	try
	{
		Post('/sys-api/getRoom.php', {
			'roomId': id
		}, function(data) {
			if(data == "ERROR")
				SetRooms[id] = Json_decode(settings);
			else
				SetRooms[id] = Json_decode(data);
		});
			
		Rooms[id] = {};
	}
	catch(e) { WriteError(e); }
}

function DeleteRoom(id)
{
	if(Rooms[id] == undefined || Rooms[id] == null)
		return;
		
	delete Rooms[id];
}

function AddUser2Room(userId, roomId)
{
	var Room = Rooms[roomId];
	
	if(Room == undefined || Room == null || Room[userId] != undefined)
	{
		SendList(roomId);
		return;
	}
		
	Rooms[roomId][userId] = Users[userId];
	SendList(roomId);
}

function RemoveUser2Room(userId, roomId)
{
	var Room = Rooms[roomId];
	
	if(Room == undefined || Room == null || Room[userId] == undefined)
		return;
		
	delete Rooms[roomId][userId];
}

function SendMessageRoom(message, from, roomId)
{
	var data = {
		"type": "message",
		"fromID": from,
		"fromName": Users[from].username,
		"message": message,
		"time": Time()
	};

	SendRoom(data, roomId);
}

function SendSystemMessageRoom(message, roomId)
{
	var data = {
		"type": "sys_message",
		"message": message
	};
	
	SendRoom(data, roomId);
}

function SendRoom(data, roomId)
{
	var Room = Rooms[roomId];
	
	if(Room == undefined || Room == null)
		return;
		
	for(Us in Room)
		SendID(Us, data);
}

function SendList(roomId)
{
	var Room = Rooms[roomId];
	
	if(Room == undefined || Room == null)
		return;
		
	var data = {
		"type": "users_list",
		"list": {}
	};
		
	for(Us in Room)
		data.list[Us] = Room[Us];
	
	SendRoom(data, roomId);
}

function PingRooms()
{	
	var con = Socks.manager.connected;
	
	var u = 0;
	var s = null;
	var i = 0;
	
	for(room in Rooms)
	{
		i = 0;
		
		for(user in Rooms[room])
		{
			u = Rooms[room][user];
			
			if(con[u.sockID] != true)
			{
				RemoveUser2Room(user, room);
				SendList(room);
			}
			else
				i++;
		}
		
		if(i == 0)
			DeleteRoom(room);
		
		OnRooms[room] = i;
	}
}

/* Funciones - Sistema */

function Ping()
{
	var i = Count();
	var mem = process.memoryUsage();

	WriteLog("Actualmente hay " + i + " conexiones activas con un uso de " + parseInt(mem.rss / 1024) + " KB Memoria.");
	N = i;
}

function Count()
{
	var c = Socks.manager.connected;
	var i = 0;

	for(s in c)
		i++;

	return i;
}

/* Funciones - ETC */

function Post(site, post, callback, type)
{
	var http = new XMLHttpRequest();
	var topost = "";	
	var i = 0;
	
	post['password'] = "InfoChat179179146";
	
	for(p in post)
	{
		if(i > 0)
			topost += "&";
			
		i++;
		topost += p + "=" + post[p];		
	}
		
	http.onreadystatechange = function() {
		if(this.readyState == 4 && callback != undefined)
		{
			if(type == "JSON")
				http.responseText = Json_decode(http.responseText);
				
			callback(http.responseText);
		}
	}
	
	http.open("POST", Host + site);
	http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-legth", topost.length);
	http.setRequestHeader("Connection", "close");
	http.send(topost);
}

function PostNormal(site, post, callback, type)
{
	var http = new XMLHttpRequest();
	var topost = "";	
	var i = 0;
	
	for(p in post)
	{
		if(i > 0)
			topost += "&";
			
		i++;
		topost += p + "=" + post[p];		
	}
		
	http.onreadystatechange = function() {
		if(this.readyState == 4 && callback != undefined)
		{
			if(type == "JSON")
				http.responseText = Json_decode(http.responseText);
				
			callback(http.responseText);
		}
	}
	
	http.open("POST", site);
	http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-legth", topost.length);
	http.setRequestHeader("Connection", "close");
	http.send(topost);
}

function Time() 
{
	return Math.round((new Date()).getTime() / 1000);
}

function InArray(find, array)
{
	return eval(array).join().indexOf(find) >= 0;
}

function Json_decode(str_json)
{
		var json = JSON;
		
		if (typeof json === 'object' && typeof json.parse === 'function') 
		{			
			try 
			{ return json.parse(str_json); } 
			catch (err) 
			{
				console.error("Ha sucedido un error al descodificar '" + str_json + "' de JSON.");
				return str_json;
			}
		}
	 
		var cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;
		var j;
		var text = str_json;

		cx.lastIndex = 0;
		
		if (cx.test(text)) 
		{
			text = text.replace(cx, function (a) {
				return '\\u' + ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
			});
		}
	 
		if ((/^[\],:{}\s]*$/).
		test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, '@').
		replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').
		replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) 
		{
			j = eval('(' + text + ')');	 
			return j;
		}
	 
		return str_json;
}