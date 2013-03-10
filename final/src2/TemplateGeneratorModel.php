<?php
include_once('../bootstrap.php');
/***
 * Represents the application's data. 
 * @var dal -- the database access object layer
 * @var client_id -- the currently selected client 
 **/
class TemplateGeneratorModel //trisha
{
	$dal;
	$client_id;

	public function __constructor()
	{
		$this->dal = new DatabaseAccessLayer();
	}

	/***
	 * Function description.
	 * @var data -- the new client name to be made
	 ***/	
	public function create_client($data){}
	public function get_clients(){}

	public function merge_client($other_client){}
	private function delete_client($client_to_delete){}

	public function set_client_id($client_id)
	{
		$this->client_id = $client_id;
	}

	public function upload_template(){}
	public function get_templates(){}

	public function create_category($data){}
	public function get_categories(){}

	public function create_saved_project($data){}
	public function get_saved_projects(){}

}

?>
