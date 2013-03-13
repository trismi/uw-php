<?php
namespace Template;
require_once('../bootstrap.php');

/**
 * Represents the database access layer
 */
class DatabaseAccessLayer 
{
		
	/**
     * DB connection
     * @db_host string
	 * @db_user string
	 * @db_pw string
	 * @db_name string
     */
	private $connOb;
	private $db_host, $db_user, $db_pw, $db_name;

    /**
	* Constructor
	* @param $opArr array
	*/
	public function __construct($opArr)
	{
		if(sizeof($opArr) < 4)
			throw new Exception("Incomplete Credentials");
		$this->db_host = $opArr['host'];
		$this->db_user = $opArr['user'];
		$this->db_pw = $opArr['password'];
		$this->db_name = $opArr['db_name'];
	}

	/**
	*  Connects to database 
	*/
	public function connect()
	{
		$this->connOb = new mysqli($this->db_host, $this->db_user, $this->db_pw, $this->db_name);
		if($this->connOb->connect_errno)
			throw new Exception($this->connOb->connect_errno);
	}
	
	/**
	*  Closes database connection
	**/
	public function disconnect()
	{
		$this->connOb->close();
	}

	/** 
	* Checks to see if the SQL has the correct format. If not, throws an Exception.
	* @array includes all the checks to complete
	* @string original sql statement to be used in Exception 
	**/
	private function paramCheck($check, $sql, $boo = false)
	{
		$trace = debug_backtrace();
		//print_r($trace);
		foreach($check as $key => $val)
		{
			if ( !preg_match( $key, $sql  ) && !$boo )
				throw new Exception('function '.$trace[1]['function'].': argument('.$sql.') ' . $val);
		}
	}
	
	/**
	*  Executes select statement. 
	*  @string the select statement
	*  @return returns an array of arrays, where each array represents a returned row
	**/
	public function select($sql)
	{
		$this->paramCheck(array('/^SELECT/i' => 'is not a select statement'), $sql);
		if($result = $this->connOb->query($sql))
		{
			$res_arr = array();
			while($row = $result->fetch_assoc())
			{
				array_push($res_arr, $row);
			}
			return $res_arr;		
		}
		else
		{
			throw new Exception('function select() : ' . $this->connOb->error);
		}
		
	}


	/* Executes update statement. Throws an exception of the query does not execute
	*  @string update statement
	*  @bool if true, will ignore that there is no where statement and update ALL records
	*  @return will return true if statement succeeds
	*/
	public function update($sql, $b = false)
	{
		$check = array
		(
			'/^UPDATE/i' => 'is not an update statement', 
			'/SET/i'=>'is not a proper update statement, no SET included', 
			'/WHERE/i' => 'is not a proper update statement, no WHERE included'
		);
		$this->paramCheck($check, $sql, $b);
		
		if($this->connOb->query($sql))
		{
			return true;
		}
		else
		{
			throw new Exception('function update() : ' . $this->connOb->error);
		}	

	}
	/**
	*  Executes delete statement. Throws an erorr if statement is not executed
	*  @string delete statement
	*  @return true if statement succeeeds. 
	*/

	public function delete($sql)
	{
		$this->paramCheck( array('/^DELETE/i'=> 'is not a delete statement'), $sql  ); 
		if($this->connOb->query($sql))
		{
			return true;
		}
		else
		{
			throw new Exception('function delete() : ' . $this->connOb->error);
		}	
	}

	/**
	*  Executes insert statement. 
	*  @string insert statement
	*  @return returns the ID of the last insert statement, or throws an error if the statement was unable to execute.
	*/
	public function insert($sql)
	{
		$this->paramCheck( array('/^INSERT/i'=> 'is not an insert statement'), $sql  ); 
		if($this->connOb->query($sql))
		{
			return $this->connOb->insert_id;
		}
		else
		{
			throw new Exception($this->connOb->error);
		}	
	}
	 

/*constructor   , takes either an array of database parameters or a configuration object that represents database parameters.
- connect()     , connect to the database
- disconnect()  , shutdowns established database connection
- selet()       , return the result of a select query. This function may return an array of rows, an array of models that represent the tables or rows.
- update()      , execute the update sql statement. It should throw an exception if the query fails to execute.
- delete()      , execute the delete sql statement. It should throw an exception if the query fails to execute.
- insert()      , execute insert sql statement. It should return last insert id if operation is successful, or throw an exception if the operation fails.
*/

}
?>
