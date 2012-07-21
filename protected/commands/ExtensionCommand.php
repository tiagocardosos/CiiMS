<?php

class ExtensionCommand extends CiiConsoleCommand
{
	protected $actions = array(
		'help',
		'build'
	);
	
	public function __call($method, $args)
	{
		$this->error($method, $args);
	}
	
	public function run($args)
	{
		$this->validateArgs($args);
		$method = (string)$args[0];
		$this->$method(isset($args[1]) ? $args[1] : NULL);	
	}
	
	private function build($args)
	{
		$fileHelper = new CFileHelper;
		$files = $fileHelper->findFiles(dirname(__FILE__).'/../config', array('fileTypes'=>array('php'), 'level'=>-1));
		
		$config = array();
		
		foreach($files as $file)
		{
			$c = include($file);
			$config = array_merge_recursive($config, (array)$c);
		}
		
		$config = serialize($config);
		try
		{
			$handle = fopen(dirname(__FILE__).'/../config/main-combined.php', 'w');	
			fwrite($handle, '<?php return \'' .$config . '\'; ?>');
			fclose($handle);
		}
		catch (Exception $e)
		{
			echo $e['message'];
		}
		
	}
	
	private function validateArgs($args)
	{
		$exit = false;
		if ($args[0] == '--help' || $args[0] == '-h')
		{
			$exit = true;
		}
		
		if (!in_array($args[0], $this->actions) && !$exit)
		{
			echo $args[0] . " is not a valid command\n\n";
			$exit = true;
		}
		
		if ($exit === true)
		{
			$this->displayGuide();
			exit();
		}
	}
	
	private function error($method, $args)
	{
		echo "Invalid runtime request.\n";
		$this->displayGuide();
		exit();
	}
	
	private function displayGuide()
	{
		echo "Use: php index.php extension [action] [extension_name]\n\n";
		echo "Options:\n";
		echo "    -h, --help                Display this menu\n";
		
		echo "\n";
	}
}