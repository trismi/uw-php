<?php

class TemplateGeneratorController
{
	public $model, $view, $client;			

	/****
	 * Initializes the controller. Makes sure a state is set for the application and for the model
	 *
	 ****/
	public function __constructor()
	{
		if( !$_REQUEST['v'] && !$_SESSION['state'])
			$_SESSION['state'] = "initial";
		else 
		{
			$_SESSION['state'] = $_REQUEST['state'];
		}
		if( !$_SESSION['client_id'])
			$_SESSION['client_id'] = $_REQUEST['client_id'];

		$this->model = new Model();
		$this->view = new View();

		$this->client= $_SESSION["client_id"];
		$this->model->set_state($_SESSION["state"]);
	}

	/****
	 * Action view gets the view for the current model
	 *
	 ****/
	public function actionView()
	{
		$this->model->set_client_id($client);
		return $view->render_view($this->model);
	}
	
	public function render($view)
	{
		echo $view;
	}



}


?>
