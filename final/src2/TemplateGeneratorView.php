<?php

include_once('../bootstrap.php');


class TemplateGeneratorView
{
	public function __constructor()
	{
		
	}
	
	public function render_view( $model)
	{
		$state = $model->get_state();
		switch($state)
		{
			case "initial":
				return initialState($model);	
				break;
			case "upload":
				return uploadState($model);	
				break;
			case "create":
				return createState($model);	
				break;
			case "generate":
				return generateState($model);	
				break;
			case "generateCode":
				return generateCodeState($model);	
				break;
		}
	}
	
	public function initialState($model)
	{
	
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
