<?php
namespace Template;
require_once('../bootstrap.php');


class TemplateGeneratorView
{
	public function __construct()
	{
		
	}
	
	public function render_view( $model)
	{
		$state = $model->get_state();
		switch($state)
		{
			case "initial":
				echo $this->initialState($model);	
				break;
			case "upload":
				return $this->uploadState($model);	
				break;
			case "create":
				return $this->createState($model);	
				break;
			case "generate":
				return $this->generateState($model);	
				break;
			case "generateCode":
				return $this->generateCodeState($model);	
				break;
		}
	}
	
	public function initialState($model)
	{
		return "From this page you will choose a client";	
	}
	public function uploadState($model)
	{
		
	}
	public function createState($model)
	{
		
	}
	public function generateState($model)
	{
		$string = ""; //will be our html code representation
		/* code here inserts model information into the view template for the generate state */
		return $string;	
	}
	public function generateCodeState($model)
	{
		
	}


}
?>
