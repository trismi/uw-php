<?php
	include_once('../bootstrap.php');
	$controller = new \Template\TemplateGeneratorController();
	$v = $controller->actionView();
	echo "<br />";//$controller->render();
	//var_dump();	
	echo "DEBUG<br />";

	//$_SESSION['state'] = "nice";
	echo "state is: " . $_SESSION['state'];

?>
