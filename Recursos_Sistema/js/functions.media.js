/*!
 * InfoSmart JavaScript - Media
 *
 * Archivo plugin para la Media de InfoSmart.
 *
 * Copyright © 2012 - InfoSmart and jQuery Techonology
 * http://www.infosmart.mx/
 * http://www.jquery.com/
 *
 * Requerimientos: jQuery, InfoSmart JavaScript Kernel.
*/

InfoMedia = {
	
	_html: '',
	_type: '',

	isPrepared : function()
	{
		if(this._html != "" || this._type != "")
			return true;
		else
			return false;
	},
	
	Crash : function()
	{
		this._html = "";
		this._type = "";
	},
	
	InitAudio : function(id, css, audio, autoplay, controls, loop, preload, src)
	{
		if(this.isPrepared())
		{
			Kernel.CLog('Ya se ha preparado un modulo de Media y no se ha ejecutado.', 'warning');
			return;
		}
			
		if(audio == "")
			audio = "audio/mpg";
			
		var html = '<audio type="' + audio + '"';
		
		if(id != "")
			html += ' id="' + id + '"';
			
		if(css != "")
			html += ' class="' + css + '"';
			
		if(autoplay != "")
			html += ' autoplay="' + autoplay + '"';
			
		if(controls != "")
			html += ' controls="' + controls + '"';
			
		if(loop != "")
			html += ' loop="' + loop + '"';
			
		if(preload != "")
			html += ' preload="' + preload + '"';
			
		if(src != "")
			html += ' src="' + src + '"';
			
		html += ">";
		
		this._html = html;
		this._type = "audio";		
	},
	
	addMedia : function(src, type)
	{
		if(!this.isPrepared())
		{
			Kernel.CLog('No es posible agregar un archivo de audio debido a que no hay ninguna instancia activa.');
			return;
		}
		
		var html = '<source src="' + src + '"';
		
		if(type != "")
			html += ' type="' + type + '"';
			
		html += " />";
		this._html += html;
	},
	
	Show : function(ele)
	{
		if(!this.isPrepared())
		{
			Kernel.CLog('No es posible mostrar un modulo de audio debido a que no hay ninguna instancia activa.');
			return;
		}
		
		if(this._type == "audio")
			this._html += "</audio>";
		else if(this._type == "video")
			this._html += "</video>";
			
		$(ele).append(this._html);
		this.Crash();
	}	
}