<?php
if($_POST)
{
	//check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
		
		$output = json_encode(array( //create JSON data
			'type'=>'error', 
			'text' => 'Sorry Request must be Ajax POST'
		));
		die($output); //exit script outputting json data
    } 
	
	//Sanitize input data using PHP filter_var().
	$user_name		= filter_var($_POST["user_name"], FILTER_SANITIZE_STRING);
	
	//additional php validation
	if(strlen($user_name)<4){ // If length is less than 4 it will output JSON error.
                                                                                                // name attr of name-field in the html
		$output = json_encode(array('type'=>'error', 'text' => 'Name is too short or empty!' , 'inputName' => 'name' ));
		die($output);
	}
	

	$output = json_encode(array('type'=>'message', 'text' => 'Hi '.$user_name .' Thank you for your email'));
	die($output);
	
}
?>