<?php
error_reporting( E_ALL | E_STRICT);
ini_set('display_errors', 'On');
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On'); 

include_once('../bootstrap.php');

$_SESSION['client_id'] = 1;

// make a model instance
$model = new TemplateGeneratorModel();

// set client id
$model->set_client_id(1);

// set state to "generate" which returns module_list, shell_list, client_id
$model->set_state("generate");



?>
<html>
<head>
<style>
	ol li
	{
		cursor:pointer;
		margin:10px 0;	
	}
</style>
<script type="application/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
	$( function()
		{
			$("ol li").click(
				function()
				{
					$("<li class='"+$(this).attr("class")+"'>" + $(this).text() + "</li>").appendTo("#list");
					$("#list li").click(
						function()
						{
							
							$(this).appendTo("#nowhere");	
						}
					);

				}
			);
			
			$("#submit").click(
				function()
				{
					
					alert( $("#list li").text()  );
					$("form").submit();	
				}
			);
		}
	);
</script>
</head>
<body>

<form action="action.php" method="post">
<?php 

// get result array
$result =  $model->get_templates("shell");

// echo categories
echo "Pick your shell: <select name=\"category\">"; 

foreach($result as $catname)
{        
	echo "<option value='".$catname['module_id']."'>".$catname['name']."</option>"; 
}
echo "</select>";

?>

<div>
	<h4>Click the below modules to add them to your email.</h4>
	<div style="float:left; width:300px;">
        Email Modules
        <ul id="list"></ul>
    
    </div>

<?php

// get result array
$result =  $model->get_templates("module");




$newArr = array("hero" => array(), "rescue" => array(), "modules" => array()  ); 
foreach($result as $entry)
{
			$newArr[ $entry['category'] ][] = $entry;
			
}

//var_dump($newArr);
// echo category/name list
foreach($newArr as $key => $entry){
	echo '<div style="float:left; width:300px;">';  
	echo "<div> category:  $key </div>";
	
		   echo "<ol>";
	foreach($entry as $piece){
		   echo "<li class='mod-".$piece['module_id']."'>".$piece['name']."</li>"; 

	}
	
		   echo "</ol>";
	echo  '</div>';
}

?>
<div id="nowhere" style="display:none;"></div>
<br style="clear:both;" />

<input type="hidden" value="" name="order" />
<button id="submit">Generate form</button>
</form>

</body>
</html>
