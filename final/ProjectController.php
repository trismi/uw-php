<?php



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

?>
