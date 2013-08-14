<?php
require_once('../testinclude.php');


class TemplateGeneratorView
{
	public $style = "<link href='styles.css' rel='stylesheet' type='text/css' />";
	public function __construct()
	{
		
	}
	
	public function render_view( $model)
	{
		$state = $model->state;
		switch($state)
		{
			case "initial":
				echo $this->initialState($model);	
				break;
			case "upload":
				echo $this->uploadState($model);	
				break;
			case "create":
				echo $this->createState($model);	
				break;
			case "generate":
				echo $this->generateState($model);	
				break;
			case "generateCode":
				echo $this->generateCodeState($model);	
				break;
			case "update":
				echo $this->updateState($model);
				break;
		}

	}
	
	public function initialState($model)
	{
		$client_list = $model->get_clients();
		//$client_list = array( "0" => "nordstrom", "2" => "make-a-wish", 3=> "rei"  );
		$html = "<html><head><title>Client List</title>" . $this->style . "</head><body><h1>Client List</h1>";
		//$html .= "<a href='StateController.php?state=initial&client_id=n/a'>choose new client</a><br /><br />";
		foreach( $client_list as $record)//$i = 0; $i < count($client_list); $i++)
		{
			$html .= 
			"<div class='client_section'><div class='client_name'>" .$record["client_name"] . "</div> 
			 <div class='upload'><a href='StateController.php?client_id=".$record["client_id"]."&state=upload'>upload modules</a></div>
			<div class='generate'><a href='StateController.php?client_id=".$record["client_id"]."&state=generate'>generate template</a></div></div>";
		}

		$html .= "<div style='clear:both;'><a class='button create' href='StateController.php?state=create'>Create a new client</a></div>";
		$html .= "</body></html>";
		return $html;	
	}
	public function uploadState($model)
	{
		$temp = $model->get_templates('all');
		$html = "<html><head><title>Client List</title>".$this->style."</head><body>";
		$html .= "<h1>Upload Page </h1>";
		$html .= "Current Modules for Client: <br />" ;
		foreach($temp as $module)
		{
			$html .= "<div class='module-edit'>" .$module["name"] . "  <a href='StateController.php?client_id=".$model->client_id."&state=update&module=".$module['module_id']."' style='float:right;width:100px;text-align:right;'>Edit</a>  </div>";
		}
		$html .= " 
		<div class='clear'></div> 
		<form action='index.php' method='post' enctype='multipart/form-data'>
		 <div class='upload-m'>
				<div class='upload-section'>Add a file:
				 <input type='file' name='code' id='code' />
			 </div>
			<div class='upload-section'>
			 Choose a category:
			  <select name='category' id='category'>
			    <option value='shell'>shell</option>
			    <option value='preheader'>preheader</option>
			    <option value='nav'>nav</option>
			    <option value='hero'>hero</option>
			    <option value='modules'>modules</option>
			    <option value='rescue'>rescue</option>
			    <option value='footer'>footer</option>
			 </select> 
			 </div>
			<div class='upload-section'>
			 Module name:
			 <input type='text' name='name' id='name' />
			 </div>
			<div class='upload-section'>
			 <input type='hidden' name='action' value='yes' />
			 <input type='submit' name='submit' value='submit' />
			</div>
			<div class='clear'></div>
		</div>
		 </form>";
		$html .= "<br /><br /><a style='clear:both;display:block;' href='StateController.php?state=initial&client_id=n/a'>choose different client</a><br /><br />";
		$html .= "</body></html>";
		return $html;
	}

	public function updateState($model)
	{
		$temp = $model->get_module_by_id($_SESSION['module']);
		$html = "<html><head><title>Client List</title>".$this->style."</head><body>";
		$html .= "<h1>Update Page </h1>";
		$html .= "Edit a module: <br />" ;


		print_r($temp);
		$html .= " 
		<div class='clear'></div> 
		<form action='index.php' method='post' enctype='multipart/form-data'>
		 <div class='upload-m'>
				<div class='upload-section'>Add a file:
				 <input type='file' name='code' id='code' />
			 </div>
			<div class='upload-section'>
			 Choose a category:
			  <select name='category' id='category'>
			    <option value='shell' " . ( ($temp[0]['category']=="shell" )  ? "selected=selected" : "")  . " >shell</option>
			    <option value='preheader' " . ( ($temp[0]['category']=="preheader" )  ? "selected=selected" : "")  . ">preheader</option>
			    <option value='nav'" . ( ($temp[0]['category']=="nav" )  ? "selected=selected" : "")  . ">nav</option>
			    <option value='hero'" . ( ($temp[0]['category']=="hero" )  ? "selected=selected" : "")  . ">hero</option>
			    <option value='modules'" . ( ($temp[0]['category']=="modules" )  ? "selected=selected" : "")  . ">modules</option>
			    <option value='rescue'" . ( ($temp[0]['category']=="rescue" )  ? "selected=selected" : "")  . ">rescue</option>
			    <option value='footer'" . ( ($temp[0]['category']=="footer" )  ? "selected=selected" : "")  . ">footer</option>
			 </select> 
			 </div>
			<div class='upload-section'>
			 Module name:
			 <input type='text' name='name' id='name' value='".$temp[0]['name']."'/>
			 </div>
			<div class='upload-section'>
			 <input type='hidden' name='action' value='yes' />
			 <input type='submit' name='submit' value='submit' />
			</div>
			<div class='clear'></div>
		</div>
		 </form>";
		$html .= "<br /><br /><a style='clear:both;display:block;' href='StateController.php?state=initial&client_id=n/a'>choose different client</a><br /><br />";
		$html .= "</body></html>";
		return $html;
	}

	public function createState($model)
	{
		
		$html = "<html><head><title>Client List</title></head><body>";
		$html .= "<h1>Create a client</h1>";
		$html .= "<form action='index.php' method='post'>";
		$html .= "";
		$html .= "Please enter a client name: <br /><input type='text' name='client_name' value=''/> ";
		$html .= "<input type='submit' value='Create This Client!'/>";
		$html .= " <input type=hidden name=action value=yes />";
		$html .= "</form>";
		$html .= "<a href='StateController.php?state=initial&client_id=n/a'>choose different client</a><br /><br />";
		$html .= "Create a new client page";
		$html .= "</body></html>";
		return $html;
	}
	public function generateState($model)
	{
		
		$html = "<html><head><title>Create a template</title>".$this->style."</head><body>";
		$html .= "<h1>Create Your Template</h1>";


		$model->set_state("generate");

		$html = "<html>
		<head>
		<style>
			ol li
			{
				cursor:pointer;
				margin:10px 0;	
			}
			ol
			{
				padding-left:1.8em;
			}
		</style>
		".$this->style."
		<script type='application/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
		<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js'></script>

		<script src='http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js'></script>
		<script type='text/javascript'>
			$( function()
				{
					$('ol li').click(
						function()
						{
							$(\"<li class='\"+$(this).attr(\"class\")+\"'>\" + $(this).text() + \"</li>\").appendTo(\"#list\");
							$(\"#list\").sortable();
							$(\"#list li\").dblclick(
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
							var hidden = '';
							var arr$ = $('#list li');	
							for(var i = 0 ; i < arr$.length ; i++) { var elt = arr$[i] ; hidden+= $(elt).attr('class'); }
							$('form').append('<input type=\'hidden\' name=\'template_list\' value=\"'+hidden+'\" />');
							$('form').validate();	
						}
					);
			
				}
			);
		</script>
		</head>
		<body>
		<h1>Create Your Template</h1>
		<form action='StateController.php?state=generateCode&client_id=".$model->client_id."' method='post'>
		";

		// get result array
		$result =  $model->get_templates("shell");

		// echo categories
		$html .= "Pick your shell: <select class='required' name='category'><option value=''></option>"; 

		foreach($result as $catname)
		{        
			$html .= "<option value='".$catname['module_id']."'>".$catname['name']."</option>"; 
		}
		$html.= "</select>";

		$html.= 
		"<div>
			<h4>Click the below modules to add them to your email.</h4>
			<div style='float:left; width:250px;min-height:300px;background-color:#aad;border-radius:5px;padding-left:1em;'>
			Email Modules
			<ul id='list'></ul>
			</div>
			<div>
		";


		// get result array
		$result =  $model->get_templates("module");




		$newArr = array("preheader" => array(), "nav" => array(), "hero" => array(), "modules" => array(), "rescue" => array()  ); 
		foreach($result as $entry)
		{
					$newArr[ $entry['category'] ][] = $entry;

		}

		//var_dump($newArr);
		// echo category/name list
		foreach($newArr as $key => $entry){
			$html.= "<div class='category-container'>  
			<div> category:  $key </div> <ol>";
			foreach($entry as $piece){
				   $html.= "<li class='mod-".$piece['module_id']."'>".$piece['name']."</li>"; 

			}

				   $html.= "</ol> </div>";
		}

			$html.= "</div><div id='nowhere' style='display:none;'></div>
		<br style='clear:both;' />

		<input type='hidden' value='' name='order' />
		<button id='submit'>Generate form</button>
		</form>";


		$html .= "<a href='StateController.php?state=initial&client_id=n/a'>choose different client</a><br /><br />";
		$html .= "</body></html>";
		return $html;
	}

	public function generateCodeState($model)
	{
		//var_dump($_SESSION);
		$template_order = explode('mod-', $_SESSION['template_list']);	
		//print_r($template_order);
		$shell = $model->get_module_by_id($_SESSION['shell_id']);
		//var_dump($shell);
		$shell_data = $shell[0];
		$shell_content = explode("<!-- %INSERT:HTML% -->", $shell_data['code']);
		//var_dump($shell_content);$order = array();
		array_shift($template_order);
		foreach($template_order as $module)
		{
			if(!empty($order[""+$module + ""]))
				$order["".$module.""] = $order["" . $module . ""] + 1;
			else
				$order["".$module.""] = 1;
		}
		//print_r($order);
		//var_dump($model->get_module_by_id($template_order[0]));
		$html = "<html><head><title>Client List</title></head><body>";
		$html .= "<br />Get your template here<br /><a href='StateController.php?client_id=".$model->client_id."&state=generate'>generate template</a><br />";
		$html .= "<textarea style='width:800px;height:1000px;'>";
		$html .= $shell_content[0];		
		foreach ($template_order as $module)
		{
			$module_row = $model->get_module_by_id($module); 
			$data = $module_row[0];
			$html .= $data['code'] . PHP_EOL; 
			
		}
		//BUGFIX: following line needs an if wrapper to check that shell_content has TWO items;
		$html .= $shell_content[1];
		$html .= "</textarea>";
		$html .= "<br /><a  href='StateController.php?state=initial&client_id=n/a'>choose different client</a><br /><br />";
		$html .= "</body></html>";
		return $html;
	}


}
?>
