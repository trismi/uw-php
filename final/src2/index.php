<?php
	require_once('../bootstrap.php');
	$controller = new TemplateGeneratorController();
	if( isset($_REQUEST['action']) && !empty( $_REQUEST['action']) )
	{
		$controller->actionExecute();	
	}
	else
	{
		$v = $controller->actionView();
		echo "<br />";//$controller->render();
		//var_dump();	
		echo "DEBUG<br />";

		//$_SESSION['state'] = "nice";
		echo "state is: " . $_SESSION['state'];
		echo "<br />client is: " . $_SESSION['client_id'];
	}
?>
<br />
<a href='StateController.php?state=initial&client_id=n/a'>reset state</a>
