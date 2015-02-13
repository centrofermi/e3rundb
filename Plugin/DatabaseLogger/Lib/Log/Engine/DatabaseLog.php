<?php
/**
* Database logger
* @author Nick Baker 
* @version 1.0
* @license MIT

# Setup

in app/config/bootstrap.php add the following

CakeLog::config('database', array(
	'engine' => 'DatabaseLogger.DatabaseLogger',
	'model' => 'CustomLogModel' //'DatabaseLogger.Log' by default
));

*/
App::uses('ClassRegistry', 'Utility');
App::uses('CakeLogInterface','Log');
App::uses('Log', 'DatabaseLogger.Model');
class DatabaseLog implements CakeLogInterface{
	
	/**
	* Model name placeholder
	*/
	var $model = null;
	
	/**
	* Model object placeholder
	*/
	var $Log = null;
	
	/**
	* Contruct the model class
	*/
	function __construct($options = array()){
		
		$this->config = $options;
		$this->model = isset($options['model']) ? $options['model'] : 'DatabaseLogger.Log';
		$this->Log = ClassRegistry::init($this->model);
	}
	
	/**
	* Write the log to database
	*/
	function write($type, $message){
		
		$types = array();
		if (isset($this->config['types'])) {
			$types = $this->config['types'];
		}
		$correctLevel = in_array($type, $types);
				
		//All types for the requested scopes
		if ( $correctLevel ) {
			$this->Log->create();		
			$this->Log->save(array(
				'type' => $type,
				'message' => $message
			));
		}
		
	}
}
