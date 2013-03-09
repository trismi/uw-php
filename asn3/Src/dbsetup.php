<?php
  include_once('Connection.php');
  

  $db_arr = array('host' => 'localhost', 'user'=>'asn2_user', 'password'=>'asn2_pass', 'db_name' => 'asn2');
  $conn = new Connection($db_arr);
  
  $conn->connect();

 $res = $conn->insert("INSERT INTO User (firstname, lastname) VALUES ('John', 'Smith')");
 $res = $conn->insert("INSERT INTO User (firstname, lastname) VALUES ('Naomi', 'Smith')");
 $res = $conn->insert("INSERT INTO User (firstname, lastname) VALUES ('Trisha', 'Smith')");
 $res = $conn->insert("INSERT INTO User (firstname, lastname) VALUES ('Jeff', 'Smith')");
 $res = $conn->insert("INSERT INTO User (firstname, lastname) VALUES ('Jen', 'Smith')");
 $res = $conn->insert("INSERT INTO User (firstname, lastname) VALUES ('Dan', 'Smith')");
 $res = $conn->insert("INSERT INTO User (firstname, lastname) VALUES ('Sara', 'Smith')");

?>
