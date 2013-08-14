<?php
namespace Template;
require_once('../bootstrap.php');

/***
 * Has properties and no functions
 *
 **/ 
class TemplateModule //vy
{
	$client;
	$category;// (shell, preheader, nav, header, hero, rescue, etc)
	$code;
	$preview_image;
	$hasChildren;
	$children;
	public function __construct( $cli, $cat, $cod, $pi, $hsCh, $chil)
	{

	}
}
?>
