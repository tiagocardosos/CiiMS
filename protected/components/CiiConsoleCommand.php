<?php 

class CiiConsoleCommand extends CConsoleCommand {
	
	public function debug($args)
	{
		print_r($args);
	}	
}