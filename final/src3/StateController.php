<?php
namespace Template;
require_once('../testinclude.php');

if( isset($_REQUEST['state']) )
{
	$_SESSION['state'] = $_REQUEST['state'];
	if( $_SESSION['state'] == "generateCode"   )
	{
		$_SESSION['shell_id'] = $_REQUEST['category'];
		$_SESSION['template_list'] = $_REQUEST['template_list'];
	}
	else if ( $_SESSION['state'] == "update")
	{
		$_SESSION['module'] = $_REQUEST['module'];
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
