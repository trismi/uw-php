<?php
namespace Template;
require_once('../bootstrap.php');

if( isset($_REQUEST['state']) )
{
	$_SESSION['state'] = $_REQUEST['state'];

}

if( isset($_REQUEST['client_id'])  )
{
	$_SESSION['client_id'] = $_REQUEST['client_id'];
}

header('location: index.php');

?>
