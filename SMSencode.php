#!/usr/bin/php
<?php

require_once('PduFactory/Pdu/PduFactory.php');
require_once('PduFactory/Pdu/Pdu.php');
require_once('PduFactory/Utf8/Utf8.php');
require_once('PduFactory/Exception/InvalidArgumentException.php');

$SMSencode = NEW Application\Pdu\PduFactory();

$longopts  = array(
    "message:",			// 
    "number:",    		// 
    "smsc:",			// + means international
    "alphabetSize:",	// 7 -> Default (7bit), 8 -> 8bit, 16 -> UCS2 (16bit)
    "class:",			// "0 Flash ", "1 ME specific ", "2 SIM specific ", "3 TE specific "
    "typeOfAddress:",	// "145": international, "161": national, "129": unknown
    "validity:",		// 
    "receipt:",			// true / false
);

$PDUelements=array();

foreach(getopt("", $longopts) as $key => $value) $PDUelements[$key] = $value;

$output=array();

$output=$SMSencode->encode($PDUelements);

echo $output['byte_size']." ".$output['message']."\n";
?>
