<?php

class Connection extends Exception
{

	private $connOb;
	private $db_host, $db_user, $db_pw, $db_name;

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
	*  Executes select statement. 
	*  @string the select statement
	*  @return returns an array of rows that represent the table
	**/
	public function select($sql)
	{
		if( !preg_match('/^SELECT/i', $sql) )
		{
			throw new Exception('function select(): argument('.$sql.') is not a select statement');
		} 	

	}
	
	/**
	*  Executes update statement. Throws an exception of the query does not execute
	*  @string update statement
	*/
	public function update()
	{
		if( !preg_match('/^UPDATE/i', $sql) )
		{
			throw new Exception('function update(): argument ('.$sql.') is not an update statement');
		} 	

	}
	/**
	*  Executes insert statement. 
	*  @string insert statement
	*  @return returns the ID of the last insert statement, or throws an error if the statement was unable to execute.
	*/

	public function delete()
	{
		if( !preg_match('/^DELETE/i', $sql) )
		{
			throw new Exception('function delete(): argument('.$sql.') is not a delete statement');
		} 	

	}

	/**
	*  Executes insert statement. 
	*  @string insert statement
	*  @return returns the ID of the last insert statement, or throws an error if the statement was unable to execute.
	*/
	public function insert($sql)
	{
		if( !preg_match('/^INSERT/i', $sql) )
		{
			throw new Exception('function insert(): argument ('.$sql.') is not an insert string');
		} 
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
