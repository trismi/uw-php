<?php
require_once('../bootstrap.php');

/**
 * Represents the controller class
 */
class TemplateGeneratorController
{
	
	/**
     * @var model 
	 * @var view 
	 * @var client 
     */
	public $model;
	public $view;
	public $client;			

	/****
	 * Initializes the controller.
	 * Makes sure a state is set for the
	 * application and for the model
	 *
	 ****/
	public function __construct()
	{
		if( !isset($_SESSION['state']) )
		{
			$_SESSION['state'] = "initial";
			$_SESSION['client_id'] = "n/a";
		}	
		$this->model = new TemplateGeneratorModel();
		/*if($this->model)
			echo "made the new model<br />";
		else
			echo "did not make the new model<br />";	
		*/$this->view = new TemplateGeneratorView();

		$this->client= $_SESSION["client_id"];
		$this->model->set_state($_SESSION["state"]);
		$this->model->set_client_id($_SESSION["client_id"]);
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
	/***
 	 * Complete the action required
	 ***/
	public function actionExecute()
	{
		switch($_SESSION['state'])
		{
			case "create":
				//echo "making a client";
				$this->model->create_client($_REQUEST['client_name']);
				header('Location: StateController.php?state=initial&client_id=n/a');				
				break;
			case "upload":
				//echo "Dealing with uploads";
				if (isset($_FILES['code']) && isset($_POST['category']) && !empty($_POST['category']) && isset($_POST['name']) && !empty($_POST['name']))
				{
					$this->model->set_client_id($_SESSION['client_id']);
					$this->model->upload_template($_FILES['code'], $_POST['category'], $_POST['name']);
				}
				header('Location: StateController.php?state=initial&client_id=n/a');				
				break;
			default:
				echo "doing something else!";
		}
	}
}

?>
