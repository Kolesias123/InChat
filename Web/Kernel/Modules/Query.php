<?php
#####################################################
## 					 BeatRock				   	   ##
#####################################################
## Framework avanzado de procesamiento para PHP.   ##
#####################################################
## InfoSmart � 2011 Todos los derechos reservados. ##
## http://www.infosmart.mx/						   ##
#####################################################
## http://beatrock.infosmart.mx/				   ##
#####################################################

// Acci�n ilegal.
if(!defined("BEATROCK"))
	exit;	

class Query
{
	private $table = "";
	private $query = "";
	private $type = "";
	
	// Funci�n - Preparaci�n de instancia.
	public function __construct($table)
	{
		$this->table = $table;
		BitRock::log("Se ha solicitado una instancia de consulta SQL para la tabla '$table'.");
	}
	
	// Funci�n privada - Lanzar error.
	private function Error($code, $function, $msg = '')
	{
		BitRock::setStatus($msg, __FILE__, Array('function' => $function, 'query' => $this->query));
		BitRock::launchError($code);
		
		return false;
	}
	
	// Funci�n - �Estamos preparados?
	// - $query (Bool): �Verificar consulta?
	public function isReady($query = false)
	{		
		// La tabla no se ha definido.
		if(empty($this->table))
			return false;
			
		// La consulta no se ha definido.
		if($query AND empty($this->query))
			return false;
			
		return true;
	}
	
	// Funci�n - Destruir instancia actual.
	public function Crash()
	{
		$this->query = "";
		$this->type = "";
	}
	
	// Funci�n - Preparar instancia de selecci�n.
	// - $data (Cadena/Array): Datos a seleccionar.
	public function Select($data)
	{
		// Destruir instancia actual.
		$this->Crash();
		
		// Ajustando tabla actual e inicio de consulta.
		$table = $this->table;
		$query = "SELECT ";
		
		// Insertando datos a seleccionar en la consulta.
		if(is_array($data))
			$query .= implode(",", $data);
		else
			$query .= $data;
		
		// Terminando consulta.
		$query .= " FROM {DA}$table ";
		
		// Definiendo consulta y tipo de instancia.
		$this->query = $query;
		$this->type = "SELECT";
	}
	
	// Funci�n - Preparar instancia de Insertado.
	// - $data (Array): Datos a insertar.
	public function Insert($data)
	{
		// Destruir instancia actual.
		$this->Crash();
		
		// Si los datos no son un Array, cancelar.
		if(!is_array($data))
			return false;
			
		$values = array_values($data);
		$keys = array_keys($data);
		
		$table = $this->table;
		$query = "INSERT INTO {DA}$table (" . implode(',', $keys) . ") VALUES ('" . implode('\',\'', $values) . "')";
		
		// Definiendo consulta y tipo de instancia.
		$this->query = $query;
		$this->type = "INSERT";
	}
	
	// Funci�n - Preparar instancia de actualizaci�n.
	// - $data (Array): Datos actualizar.
	public function Update($data)
	{
		// Destruir instancia actual.
		$this->Crash();
		
		// Si los datos no son un Array, cancelar.
		if(!is_array($data))
			return false;
			
		// Ajustando tabla actual e inicio de consulta.
		$table = $this->table;
		$query = "UPDATE {DA}$table SET ";
		
		// Insertando datos actualizar en la consulta.
		foreach($data as $key => $value)
		{
			$i++;
			$query .= "$key = '$value'";
			
			if(count($data) !== $i)
				$query .= ",";
		}
		
		// Definiendo consulta y tipo de instancia.
		$query .= " ";
		$this->query = $query;
		$this->type = "UPDATE";
	}
	
	// Funci�n - Agregar condici�n a la instancia actual.
	// - $param: Parametro.
	// - $value: Valor.
	// - $type (WHERE, OR, AND): Tipo de condici�n.
	// - $cond (=, !=, LIKE): Condici�n interna.
	public function Add($param, $value, $type = 'WHERE', $cond = '=')
	{
		// No ninguna instancia actual o el tipo no es v�lido.
		if(!$this->isReady(true) OR $this->type == "INSERT")
			return $this->Error('01q', __FUNCTION__);
			
		// Si es una condici�n interna de b�squeda...
		if($cond == "LIKE")
			$this->query .= "$type $param $cond '%$value%' ";
		else
			$this->query .= "$type $param $cond '$value' ";
	}
	
	// Funci�n - Agregar condici�n de b�squeda avanzada.
	// - $params (Array): Parametros en donde buscar.
	// - $search: Valor a buscar.
	// - $type (WHERE, OR, AND): Tipo de condici�n.
	public function Search($params, $search, $type = 'WHERE')
	{
		// No ninguna instancia actual o el tipo no es v�lido.
		if(!$this->isReady(true) OR $this->type == "INSERT")
			return $this->Error('01q', __FUNCTION__);
			
		// Si los datos no son un Array, cancelar.
		if(!is_array($params))
			return false;
			
		$this->query .= "$type MATCH(" . implode(",", $params) . ") AGAINST('+($search)' IN BOOLEAN MODE) ";
	}
	
	// Funci�n - Agregar orden a los datos.
	// - $id (Cadena/Array): Elementos con los que ordenar.
	// - $type (DESC, ASC): Tipo de orden.
	public function Order($id, $type = 'DESC')
	{
		// No ninguna instancia actual o el tipo no es v�lido.
		if(!$this->isReady(true) OR $this->type == "INSERT")
			return $this->Error('01q', __FUNCTION__);
		
		// Ajustando inicio de consulta.
		$query = "ORDER BY ";
		
		// Insertando elementos de ordenamiento en la consulta.
		if(is_array($id))
			$query .= implode(",", $id);
		else
			$query .= $id;
		
		// Definiendo consulta.		
		$query .= " $type ";
		$this->query .= $query;
	}
	
	// Funci�n - Agregar limite de aplicaci�n a datos.
	// - $limit (Int/Array): Limite.
	public function Limit($limit = 1)
	{
		// No ninguna instancia actual o el tipo no es v�lido.
		if(!$this->isReady(true) OR $this->type == "INSERT")
			return $this->Error('01q', __FUNCTION__);
			
		// Ajustando inicio de consulta.
		$query = "LIMIT ";
		
		// Insertando limites en la consulta.
		if(is_array($limit))
			$query .= implode(",", $limit);
		else
			$query .= $limit;
			
		// Definiendo consulta.
		$this->query .= $query;
	}
	
	// Funci�n - Ejecutar consulta.
	public function Run()
	{
		// No ninguna instancia actual.
		if(!$this->isReady(true))
			return $this->Error('02q', __FUNCTION__);
		
		// Ejecutando consulta y devolviendo resultado.
		$this->query = trim($this->query);
		return query($this->query);
	}
	
	// Funci�n - Obtener valor de una instancia.
	// - $param: Valor a obtener.
	public function Get($param)
	{
		// No ninguna instancia actual.
		if(!$this->isReady(true))
			return $this->Error('02q', __FUNCTION__);
			
		// Ejecutando proceso.
		$q = $this->Run();
		$r = mysql_fetch_assoc($q);
		
		// Devolviendo resultado.
		return $r[$param];
	}
	
	// Funci�n - Obtener las filas de una instancia.
	public function Rows()
	{
		// No ninguna instancia actual.
		if(!$this->isReady(true))
			return $this->Error('02q', __FUNCTION__);
			
		// Ejecutando proceso.
		$q = $this->Run();
		$r = mysql_num_rows($q);
		
		// Devolviendo resultado.
		return $r;
	}
	
	// Funci�n - Obtener toda la informaci�n de una instancia.
	public function Data()	
	{
		// No ninguna instancia actual.
		if(!$this->isReady(true))
			return $this->Error('02q', __FUNCTION__);
			
		// Ejecutar consulta.
		$q = $this->Run();
		
		// Devolviendo resultados.
		return Array(
			'assoc' => mysql_fetch_assoc($q),
			'rows' => mysql_num_rows($q),
			'resource' => $q
		);
	}
	
	// Funci�n - Obtener el texto de la consulta actual.
	public function Show()
	{
		// No ninguna instancia actual.
		if(!$this->isReady())
			return $this->Error('02q', __FUNCTION__);
		
		// Devolviendo consulta.
		return $this->query;
	}
}
?>