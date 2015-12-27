<?php
namespace Crowler\Model;
class Database
{
	
	protected  $db_connect_id=false;				// connection id of this database
	protected $db_result=false;				// current result of an query
	protected  $_dbname;				// current result of an query
	
	protected  $sqlserver="localhost";			
	protected  $sqluser="root";			
	protected  $sqlpassword="";
	protected  $dbname="rohlikcz";
	
	public function __construct() { 
		$this->DB();
	}
	
	public function setProperty_db_result($newval)
	{
		$this->db_result = $newval;
	}
	
	public function getProperty_db_result()
	{
		return $this->db_result;
	}
	
	public function setProperty_db_connect_id($newval)
	{
		$this->db_connect_id = $newval;
	}
	
	public function getProperty_db_connect_id()
	{
		return $this->db_connect_id;
	}
	
	public function setProperty__dbname($newval)
	{
		$this->_dbname = $newval;
	}
	
	public function getProperty__dbname()
	{
		return $this->_dbname;
	}
	
	
	public function DB()
	{
		
		$sqlserver = $this->sqlserver;
		$sqluser = $this->sqluser;
		$sqlpassword=  $this->sqlpassword;
		$dbname = $this->dbname;
		
		$this->db_connect_id = @mysql_connect($sqlserver, $sqluser, $sqlpassword, true);
		if (isset($this->db_connect_id) and $this->db_connect_id)
		{
			if (!$dbselect = @mysql_select_db($dbname))
			{
				@mysql_close($this->db_connect_id);
				$this->db_connect_id = $dbselect;
			}else{
				//mysql_query("SET NAMES 'utf8'");
				@mysql_query("SET NAMES 'utf8'", $dbname);
				$table_db=@mysql_query('select 1 from product');
				if($table_db===false){
					die('Error: Database is not install');
				}
			}
		}
		if(!$this->db_connect_id)
		{
			die('Error: Could not connect to the database');
		}
		return $this->db_connect_id;
	}
	// function close
	// Close SQL connection
	// should be called at very end of all scripts
	// ------------------------------------------------------------------------------------------

	public function close()
	{
		if (isset($this->db_connect_id) and $this->db_connect_id)
		{
			if (isset($this->db_result) and $this->db_result)
			{
				@mysql_free_result($this->db_result);
			}

			$result = mysql_close($this->db_connect_id);

			return $result;
		}
		else
		{
			return false;
		}

	}
	// function query
	// Run an sql command
	// Parameters:
	//		$query:		the command to run
	// ------------------------------------------------------------------------------------------

	public function query($query)
	{
		// Clear old query result
       // return $query;
		$this->db_result=false;
		@mysql_query("SET NAMES 'utf8'" /*, $this->_dbname*/);
		//$this->query(mysql_query($sql));
		if (!empty($query))
		{
			if(!($this->db_result = @mysql_query($query, $this->db_connect_id)))
			{
				echo '<p><font size=3><b>'.mysql_error($this->db_connect_id).'</b></font></p>'; // face="Courier New,Courier" 
			}
		}
		return $this->db_result;
	}
	
	public function insert($table, $values, $replace=false)
	{
		if($replace)
		{
			$query='replace';
		}
		else
		{
			$query='insert into';
		}
		$query.=' `'.$table.'`(';
		$i=0;
		if(is_array($values))
		{
			foreach($values as $key=>$value)
			{
				if($key)
				{
					if($i<>0)
					{
						$query.=',';
					}
					$query.='`'.$key.'`';
					$i++;
				}
			}
			$query.=') values(';
			$i=0;
			foreach($values as $key=>$value)
			{
				if($i<>0)
				{
					$query.=',';
				}

				if($value==='NULL')
				{
					$query.='NULL';
				}
				else
				{
					$query.='\''.DB::escape($value).'\'';
				}
				$i++;
			}
			$query.=')';
			if($this->query($query))
			{
				return DB::insert_id();		
			}
		}
	}
	public function delete($table, $condition)
	{
		$query='delete from `'.$table.'` where '.$condition;
		
		if($this->query($query))
		{		
			return true;
		}
	}
	public function fetch($sql = false, $field = false, $default = false)
	{
		if($sql)
		{
			
			$this->query($sql);
		}
		$query_id = $this->db_result;
		if ($query_id)
		{
			if($result = @mysql_fetch_assoc($query_id))
			{
				if($field)
				{
					return $result[$field];
				}
				return $result;
			}
			return $default;
		}
		else
		{
			return false;
		}
	}
	public function fetch_all($sql=false)
	{
		//return $sql;
		
		if($sql)
		{
			//mysql_query("SET NAMES 'utf8'");
			
			$result = $this->query($sql);
		}
		//$query_id = $this->db_result;
		
		return $result;

		if ($query_id)
		{
			$result=array();
			while($row = @mysql_fetch_assoc($query_id))
			{
				$result[$row['id']] = $row;
			}

			return $result;
		}
		else
		{
			return false;
		}
	}
	public function insert_id()
	{
		if ($this->db_connect_id)
		{
			mysql_query("SET NAMES 'utf8'");
			$result = mysql_insert_id(mysql_query($this->db_connect_id));
			return $result;
		}
		else
		{
			return false;
		}
	}
	public function update($table, $values, $condition)
	{
		$query='update `'.$table.'` set ';
		$i=0;
		if($values)
		{
			foreach($values as $key=>$value)
			{
				if($i<>0)
				{
					$query.=',';
				}
				if($key)
				{
					if($value=='NULL')
					{
						$query.='`'.$key.'`=NULL';
					}
					else
					{
						$query.='`'.$key.'`=\''.DB::escape($value).'\'';
					}
					$i++;
				}
			}
			$query.=' where '.$condition;
			if($this->query($query))
			{
				return true;
			}
		}
	}
	public function escape($sql)
	{
		return @mysql_real_escape_string($sql);
	}
}

?>