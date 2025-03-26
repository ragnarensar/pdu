#!/usr/bin/php
<?php
// Klasse "PduFactory" zum Decodieren von SMS-PDUs einbinden
require_once('PduFactory/Pdu/PduFactory.php');
require_once('PduFactory/Pdu/Pdu.php');
require_once('PduFactory/Utf8/Utf8.php');
require_once('PduFactory/Exception/InvalidArgumentException.php');

// Erstelle neues Objekt der Klasse "PduFactory"
$SMSdecode = NEW Application\Pdu\PduFactory();

// '0791947107160000240C919461638398530000610180919063802046BF1C442DCFE97390581EAE8FD174503BEC0651CB733A394C2FBB5D'
//print_r($SMSdecode->decode($argv[1]));
//*

foreach($SMSdecode->decode($argv[1]) as $key => $value)
{
	if (!(is_array($value))) {
		echo "PDUelements[\"".$key."\"]=\"".$value."\"\n";
	}
	else
	{
		foreach($value as $key2 => $value2)
		{
			 echo "PDUelements[\"".$key."_".$key2."\"]=\"".$value2."\"\n";
		}
	}
}
//*/
?>