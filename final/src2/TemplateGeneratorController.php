<?php
namespace Template;
require_once('../bootstrap.php');

class TemplateGeneratorController
{
	public $model; public $view; public $client;			

	/****
	 * Initializes the controller. Makes sure a state is set for the application and for the model
	 *
	 ****/
	public function __construct()
	{
		
		$this->model = new \Template\TemplateGeneratorModel();
		/*if($this->model)
			echo "made the new model<br />";
		else
			echo "did not make the new model<br />";	
		*/$this->view = new \Template\TemplateGeneratorView();

		$this->client= $_SESSION["client_id"];
		$this->model->set_state($_SESSION["state"]);
	}

	/****
	 * Action view gets the view for the current model
	 *
	 ****/
	public function actionView()
	{
		$this->model->set_client_id( $_SESSION['client_id']  );
		$this->view->render_view($this->model);
	}
}


?>
