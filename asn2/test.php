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

try{
$conn->insert("select thing");
}catch(Exception $e)
{
	echo "" . $e->getMessage(). "\n";
}
try{
 $res = $conn->insert("INSERT INTO User (firstname, lastname) VALUES ('John', 'Smith')");
 echo "id resulting from insert: " $res . "\n";
}catch(Exception $e)
{
	echo "" . $e->getMessage(). "\n";
}
  echo "Script finished \n";
?>
