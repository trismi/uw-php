<?php
	include_once('../bootstrap.php');
	$controller = new \Template\TemplateGeneratorController();
	$v = $controller->actionView();
	echo "<br />";//$controller->render();
	//var_dump();	
	echo "DEBUG<br />";

	//$_SESSION['state'] = "nice";
	echo "state is: " . $_SESSION['state'];
	echo "<br />client is: " . $_SESSION['client_id'];
	
?>
<br />
<a href='StateController.php?state=initial&client_id=n/a'>reset state</a>
