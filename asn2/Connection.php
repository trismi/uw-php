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

	public function connect()
	{
		$this->connOb = new mysqli($this->db_host, $this->db_user, $this->db_pw, $this->db_name);
		if($this->connOb->connect_errno)
			throw new Exception($this->connOb->connect_errno);
	}

	public function disconnect()
	{
		$this->connOb->close();
	}

	public function select()
	{

	}

	public function update()
	{

	}

	public function delete()
	{

	}

	/**
	*  Executes insert statement. 
	*  @string insert statement
	*  @return returns the ID of the last insert statement, or throws an error if the statement was unable to execute.
	*/
	public function insert($sql)
	{
		if( !preg_match($sql, '/^INSERT/') )
		{
			throw new Exception('Not an insert statement');
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
