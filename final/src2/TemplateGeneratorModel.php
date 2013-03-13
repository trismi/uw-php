<?php
require_once('../bootstrap.php');
/***
 * Represents the application's data. 
 * @var dal -- the database access object layer
 * @var client_id -- the currently selected client 
 **/
class TemplateGeneratorModel
{
	public $dal, $client_id;
	public $state;
	public $client_list;
	public $module_list;
	public $shell_list;

	public function __construct()
	{
		global $db_arr;
		$this->dal = new DatabaseAccessLayer($db_arr);
	}

	/***
	 * This function creates clients
	 * @var data -- the new client name to be made
	 ***/	
	public function create_client($data){
		 $this->dal->connect();
		 $this->dal->insert("INSERT INTO Client (client_name) VALUES ('$data')");	
		 $this->dal->disconnect();
	}
	
	/***
	 * This function returns a list of clients
	 * @var data -- get client list
	 * return variable is an array client_id -> client_name
	 ***/	
	public function get_clients(){
		$this->dal->connect();
		$result = $this->dal->select("SELECT client_name, client_id FROM Client");	
		$this->dal->disconnect();
		return $result;
	}
	
	/***
	 * This function checks to see if client has a shell
	 * returns true if client has shells else returns false 
	 ***/	
	public function has_shell($client_id) {
		$this->dal->connect();
		$result = $this->dal->select("SELECT client_id FROM Module where category = 'shell'");	
		$this->dal->disconnect();
		
		if($result){
			return true;
		}else{
			return false;
		}
		return $result;
	}

    /***
	 * Todo
	 * @var data -- if duplicate client, merge module and delete other client
	 ***/	
	public function merge_client($other_client) {}
	
	/***
	 * Todo
	 * @var data -- delete duplicate client
	 ***/	
	private function delete_client($client_to_delete){}

    /***
	 * This function sets client id
	 * @var data -- set client
	 ***/	
	public function set_client_id($client_id)
	{
		$this->client_id = $client_id;
	}
	
/***
	* This will upload HTML into the module table. 
	* The client_id will be $this->client_id
	* @var data -- upload modules
	***/
	public function upload_template($code, $category, $name){
	 
	// set path of uploaded file
	$path = "./".basename($code['name']); 
	 
	// move file to current directory
//	move_uploaded_file($code['tmp_name'], $path);
	 
	// get file contents
	$file_contents = file_get_contents($code['tmp_name'], NULL, NULL, 0, 60000);
	 
	// delete file
	//unlink($code['name']);

	$this->dal->connect();
	$this->dal->insert("INSERT INTO Module (client_id, code, category, name) VALUES ($this->client_id, '".addslashes($file_contents)."', '$category', '$name')");
	$this->dal->disconnect();
	 
	       
	}
    /***
	 * This will upload HTML into the module table. 
	 * The client_id will be $this->client_id
	 * @var data -- upload modules
	 ***/	
	/*public function upload_template($code, $category,$name){
		
		// set path of uploaded file
		$path = "./".basename($_FILES['code']['name']); 
		
		// move file to current directory
		move_uploaded_file($_FILES['code']['tmp_name'], $path);
		
		// get file contents
		$code = file_get_contents($path, NULL, NULL, 0, 60000);
		
		// delete file
		unlink($_FILES['code']['name']);

		$this->dal->connect();
		$this->dal->insert("INSERT INTO Module (client_id, code, category, name) VALUES ($this->client_id, '".$code."', '$category', '$name')");
		$this->dal->disconnect();
		
       
	}*/
	
	/***
	 * This function gets modules based on 3 category options ("shell", "module", and "all")
	 * @var data -- get modules
	 ***/	
	public function get_templates($option){		
		
		    // option = "shell": returns all modules with shell in category
			if ($option == 'shell') {
				
				$this->dal->connect();
				$result = $this->dal->select("SELECT * from Module where category ='shell' and client_id = '".$this->client_id."'");
				$this->dal->disconnect();			
				
			}
			
			// option = "module": returns everything not a shell in category	
			else if ($option == 'module') {
				
				$this->dal->connect();
				
				$result = $this->dal->select("SELECT * from Module where category != 'shell' and client_id = '".$this->client_id."'");
				$this->dal->disconnect();	
			
			}
			
			// option = "all": returns everything in category	
			else if ($option == 'all') {
				$this->dal->connect();
				$result = $this->dal->select("SELECT * from Module where client_id = '".$this->client_id."'");
				$this->dal->disconnect();	
			
			}
		    return $result;
		
	}

    /***
	 * Todo
	 * @var data -- create categories
	 ***/	
	public function create_category(){
	}
	
	/***
	 * Todo
	 * @var data -- get categories
	 ***/	
	public function get_categories(){

	}

	/***
	 * Todo
	 * @var data -- create saved projects
	 ***/	
	public function create_saved_project(){}
	
	/***
	 * Todo
	 * @var data -- get saved projects
	 ***/	
	public function get_saved_projects(){}
	
	
     /***
	 * This function sets the states ("initial", "upload", "generate")
	 * @var data -- set states
	 ***/
	public function set_state($state)
	{
		$this->state = $state;
		
		switch($state)
		{
			case "initial":
				// initial state: returns client_list
				$this->client_list = $this->get_clients();
				break;
			case "upload":
			    // upload state: returns client_list, module_list, shell_list
				$this->module_list = $this->get_templates("module");
				$this->shell_list = $this->get_templates("shell");
				$this->client_list = $this->get_clients();
				break;
			case "generate":
			     // generate state: returns module_list, shell_list, client_id
				$this->module_list = $this->get_templates("module");
				$this->shell_list = $this->get_templates("shell");
				break;
		}

	}
}

?>

