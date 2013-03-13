<?php
namespace Template;
require_once('../bootstrap.php');

/**
 * Sets sessions for:
 * state
 * client_id
 */
if( isset($_REQUEST['state']) )
{
	$_SESSION['state'] = $_REQUEST['state'];
	if( $_SESSION['state'] == "generateCode"   )
	{
		$_SESSION['shell_id'] = $_REQUEST['category'];
		$_SESSION['template_list'] = $_REQUEST['template_list'];
	}
}

if( isset($_REQUEST['client_id']) )
{
	$_SESSION['client_id'] = $_REQUEST['client_id'];
}
else
{

	$_SESSION['client_id'] = 'n/a';
}
header('location: index.php');

?>
