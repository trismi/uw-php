<?php
  include_once('Connection.php');
  

  $db_arr = array('host' => 'localhost', 'user'=>'asn2_user', 'password'=>'asn2_pass');
  try{
	$conn = new Connection($db_arr);
  }catch (Exception $e)
  {
	echo "Connection1 attempt " . $e->getMessage() . "\n";
  }
  $db_arr = array('host' => 'localhost', 'user'=>'asn2_ser', 'password'=>'asn2_pass', 'db_name' => 'asn2');
  try{
	$conn = new Connection($db_arr);
  }catch (Exception $e)
  {
	echo "Connection2 attempt " . $e->getMessage(). "\n";
  }
  $db_arr = array('host' => 'localhost', 'user'=>'asn2_user', 'password'=>'asn2_pass', 'db_name' => 'asn2');
  try{
	$conn = new Connection($db_arr);
  }catch (Exception $e)
  {
	echo "Connection2 attempt " . $e->getMessage(). "\n";
  }
  
try{
$conn->connect();
}catch (Exception $e)
{
	echo "conn->connect() exception : " . $e->getMessage() . "\n";
}

$conn->insert("BLUE thing");

  echo "Script finished \n";
?>
