<?php
// This code is released under a CC-Zero license
// https://creativecommons.org/publicdomain/zero/1.0/
// You need the AWS SDK - get the zip file from here: 
// http://pear.amazonwebservices.com/get/aws.zip
// And then unpack it to this directory.
require './../libs-aws/aws-autoloader.php';
	
include './credentials.php';

    
// Now start the instance
$result = $client->stopInstances(array(
	// You must put an instance ID here
	'InstanceIds' => array($_GET['instance'])
));

// If you've actually managed to start an instance
// this will tell you that it's started

$arrResult = $result['StartingInstances'][0];
$was = $arrResult['PreviousState']['Name'];
$is = $arrResult['CurrentState']['Name'];

header("Location: ./dir.php");

?>