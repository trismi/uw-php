<?php


class ClientsView //vy
{
	/***
	 *  This function renders the list of clients, along with buttons for actions for each client
	 *	Each client's saved Projects will render as a list
	 *  Each client will have an upload button.
	 *  Each client will have a "generate code" button.
	 *  Each client will have a "merge client" button that will merge it's Projects into another client, then delete the client.
	 ***/
	public function viewRender(){}

}

//ClientsModel -- database 
class ClientsController //vy
{
	/*** 
	 * This function will create a new client in the database.
	 **/
	public function createNewClient()
	{
		//DAL:insert	
	}
	/***
	 * This function will merge the data from one client into another client, then delete the client in question.
	 ***/
	public function mergeClient()
	{
		//DAL:update
		//Merges Projects from one client into another client in case of duplicate clients
	}
	/***
	 * This function will upload data associated to a client's module.
	 ***/
	public function uploadClientData()
	{
		//DAL:insert
		//Merges Projects from one client into another client in case of duplicate clients
	}
	/***
	 * Will only be called by mergeClient. Deletes the client
	 **/
	private function deleteClient()
	{
		//DAL:delete
		//deletes a client. should only use after mergeClient (no data loss)
	}
}

/*Client Table-
client_id	client_name	

Module table
module_id	client_id 	code (blob/varchar)	category	preview_image(blob)

Project Table
project_id	client_id	shell_id (module)	


Project Helper Table
project_id	module_id
	*/	


/***
 * Has properties and no functions
 *
 **/ 
class Module //vy
{
	$client;
	$category;// (shell, preheader, nav, header, hero, rescue, etc)
	$code;
	$preview_image;
	$hasChildren;
	public function __construct( $cli, $cat, $cod, $pi, $hsCh)
	{

	}
}

/***
 * Represents a Project. 
 * @var shell -- the shell
 * @var module_list -- associated modules for this Project 
 **/
class ProjectModel //trisha
{
	property:shell
	property:module list
}

class ProjectView //trisha
{
	/***
	 * Will render the view for this Project. 
	 * Look at the picture to see what panels need to be included
	 **/
	public function render()
	{
		//	-this is the panel that triggers ProjectController / generate button for the code
		//	-needs to have an "upload images" button
		//		-module drag&drop reordering
		//	-load saved Project
		//	-save Project	
	}
}

/***
 * This class controls the project model (db based)
 **/
class ProjectController //trisha
{
	private class Parser //trisha & vy
	{
		parseTags
		findInsertTags
		setModule
		getModule
		insertResource
		resizeImages
	}

	/***
	 * This will return the generated code for the project
	 * @var shell -- the shell all the other code will reside in
	 * @var modules -- the list of modules being used
	 * @var images -- the images to be inserted / resized
	 **/
	public function generateProjectCode()
	{

	}

	/***
	 * This will save a shell with an associated module list to be quick-loaded for future use
	 * @var shell
	 * @var module_list
	 **/
	public function saveProject()
	{

	}
	/***
	 * This will retreived a project model from the database, and load the view with the appropriate variables.
	 * @var project_id -- the project id
	 **/
	public function loadProject()
	{

	}
}	
/*
ProjectModel
	Shell
	Ordered associated modules
	client_id	project_id	module_id
	1			2			3
	1			2			1
*/

/***
 * This is the database access layer. It will be used by the other classes.
 **/ 
class DatabaseAccessLayer  //vy
{
/* steal all this crap from asn3*/
/*DAL (database access layer)
	connect
	disconnect
	insert
	update
	select
	delete
*/
}	

?>
