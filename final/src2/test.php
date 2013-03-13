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

$html = "<html>
<head>
<style>
	ol li
	{
		cursor:pointer;
		margin:10px 0;	
	}
</style>
<script type='application/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
<script type='text/javascript'>
	$( function()
		{
			$('ol li').click(
				function()
				{
					$(\"<li class='\"+$(this).attr(\"class\")+\"'>\" + $(this).text() + \"</li>\").appendTo(\"#list\");
					$(\"#list li\").click(
						function()
						{
							
							$(this).appendTo(\"#nowhere\");	
						}
					);

				}
			);
			
			$(\"#submit\").click(
				function()
				{
					
					alert( $(\"#list li\").text()  );
					$(\"form\").submit();	
				}
			);
		}
	);
</script>
</head>
<body>

<form action='index.php' method='post'>
";

// get result array
$result =  $model->get_templates("shell");

// echo categories
$html .= "Pick your shell: <select name='category'>"; 

foreach($result as $catname)
{        
	$html .= "<option value='".$catname['module_id']."'>".$catname['name']."</option>"; 
}
$html.= "</select>";

$html.= 
"<div>
	<h4>Click the below modules to add them to your email.</h4>
	<div style='float:left; width:300px;'>
        Email Modules
        <ul id='list'></ul>
    
    </div>
";


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
	$html.= "<div style='float:left; width:300px;'>  
	<div> category:  $key </div> <ol>";
	foreach($entry as $piece){
		   $html.= "<li class='mod-".$piece['module_id']."'>".$piece['name']."</li>"; 

	}

		   $html.= "</ol> </div>";
}

$html.= "<div id='nowhere' style='display:none;'></div>
<br style='clear:both;' />

<input type='hidden' value='' name='order' />
<button id='submit'>Generate form</button>
</form>

</body>
</html>";
echo $html;
?>


