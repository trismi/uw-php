<?php

include_once('../bootstrap.php');


class TemplateGeneratorView
{
	public function __construct(){}

	/****
	 * Returns the correct view based on a cue somewhere
	 ****/
	public function render(){}


	/**** 
	 * Creates the intial view of the project where you can see the Client list, and take actions for each client.
	 ****/
	private function initialView(){}	
	 
	/****
	 * Creates the view where you create a new client.
	 ****/
	private function createClient(){}

	/****
	 * Creates the view where you can upload modules to a specific client.
	 ****/
	private function uploadView(){}
	 
	 /****
	  * Creates the view where you create a template in the gui in order to generate the code that a person will be saving.
	  ****/
	private function generateView(){}
}
?>
