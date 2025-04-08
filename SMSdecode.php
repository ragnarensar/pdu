#!/usr/bin/php
<?php

require_once('PduFactory/Pdu/PduFactory.php');
require_once('PduFactory/Pdu/Pdu.php');
require_once('PduFactory/Utf8/Utf8.php');
require_once('PduFactory/Exception/InvalidArgumentException.php');

$SMSdecode = NEW Application\Pdu\PduFactory();

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

?>
