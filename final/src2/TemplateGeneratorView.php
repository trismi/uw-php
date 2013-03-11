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
		}
	}
	
	public function initialState($model)
	{
		$client_list = $model->get_clients();
		$client_list = array( "0" => "nordstrom", "2" => "make-a-wish", 3=> "rei"  );
		$html = "<html><head><title>Client List</title></head><body>";
		//$html .= "<a href='StateController.php?state=initial&client_id=n/a'>choose new client</a><br /><br />";
		foreach( $client_list as $client_id => $client_name)//$i = 0; $i < count($client_list); $i++)
		{
			$html .= " $client_name <a href='StateController.php?client_id=$client_id&state=upload'>upload modules</a> &nbsp; <a href='StateController.php?client_id=$client_id&state=generate'>generate template</a><br />";
		}

		$html .= "<br /><br /><a href='StateController.php?state=create'>Create a new client</a>";
		$html .= "</body></html>";
		return $html;	
	}
	public function uploadState($model)
	{
	
		$html = "<html><head><title>Client List</title></head><body>";
		$html .= "Upload Page <br />";
		$html .= "<a href='StateController.php?state=initial&client_id=n/a'>choose different client</a><br /><br />";
		$html .= "</body></html>";
		return $html;
	}
	public function createState($model)
	{
		
		$html = "<html><head><title>Client List</title></head><body>";
		$html .= "Create a client page<br />";
		$html .= "<a href='StateController.php?state=initial&client_id=n/a'>choose different client</a><br /><br />";
		$html .= "Create a new client page";
		$html .= "</body></html>";
		return $html;
	}
	public function generateState($model)
	{
		
		$html = "<html><head><title>Make a template</title></head><body>";
		$html .= "Make a template page<br />";
		$html .= "<a href='StateController.php?state=initial&client_id=n/a'>choose different client</a><br /><br />";
		$html .= "</body></html>";
		return $html;
	}
	public function generateCodeState($model)
	{
		
		$html = "<html><head><title>Client List</title></head><body>";
		$html .= "Get your template here<br />";
		$html .= "<a href='StateController.php?state=initial&client_id=n/a'>choose different client</a><br /><br />";
		$html .= "</body></html>";
		return $html;
	}


}
?>
