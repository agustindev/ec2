<?php

	date_default_timezone_set('America/Argentina/Buenos_Aires');

	try{
		$client = \Aws\Ec2\Ec2Client::factory(array(
			// Credentials obtained by creating a user account in:
			// https://console.aws.amazon.com/iam/home?#users
			// Remember to add a full admin access user policy to the user
			'version' => '2015-10-01',
			'region'  => 'xx-xxx-x',
			'credentials' => array(
				'key' => 'XXXXXXXXXXXXXXXXX',
				'secret'  => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
			)
		));
		
		
	} catch (Exception $e){

		echo $e->getMessage();
	}	
?>