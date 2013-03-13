<?php
require_once('../bootstrap.php');


class TemplateGeneratorView
{
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
		}
?>
<?php	}
	
	public function initialState($model)
	{
		$client_list = $model->get_clients();
		//$client_list = array( "0" => "nordstrom", "2" => "make-a-wish", 3=> "rei"  );
		$html = "<html><head><title>Client List</title></head><body>";
		//$html .= "<a href='StateController.php?state=initial&client_id=n/a'>choose new client</a><br /><br />";
		foreach( $client_list as $record)//$i = 0; $i < count($client_list); $i++)
		{
			$html .= $record["client_name"] . " <a href='StateController.php?client_id=".$record["client_id"]."&state=upload'>upload modules</a> &nbsp; <a href='StateController.php?client_id=".$record["client_id"]."&state=generate'>generate template</a><br />";
		}

		$html .= "<br /><br /><a href='StateController.php?state=create'>Create a new client</a>";
		$html .= "</body></html>";
		return $html;	
	}
	public function uploadState($model)
	{
	
		$html = "<html><head><title>Client List</title></head><body>";
		$html .= "Upload Page <br />";
		$html .= " 
 <form action='index.php' method='post' enctype='multipart/form-data'>
 Add a file:
 <input type='file' name='code' id='code' />
 <br /><br />
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
 <br /><br />
 Add a module name:
 <input type='text' name='name' id='name' />
 <br /><br />
 <input type='hidden' name='action' value='yes' />
 <input type='submit' name='submit' value='submit' />
 </form>";
		$html .= "<a href='StateController.php?state=initial&client_id=n/a'>choose different client</a><br /><br />";
		$html .= "</body></html>";
		return $html;
	}
	public function createState($model)
	{
		
		$html = "<html><head><title>Client List</title></head><body>";
		$html .= "Create a client page<br /><br />";
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
