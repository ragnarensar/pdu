#!/usr/bin/php
<?php
// Klasse "PduFactory" zum Codieren von SMS-PDUs einbinden
require_once('PduFactory/Pdu/PduFactory.php');
require_once('PduFactory/Pdu/Pdu.php');
require_once('PduFactory/Utf8/Utf8.php');
require_once('PduFactory/Exception/InvalidArgumentException.php');

// Erstelle neues Objekt der Klasse "PduFactory"
$SMSencode = NEW Application\Pdu\PduFactory();

#/usr/local/smi/share/php/SMSencode.php --message test --receiver 4523 --alphabetSize 7

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

# define array for hold the list of parameters to encode function
$PDUelements=array();

# fill the array with the parameters 
foreach(getopt("", $longopts) as $key => $value) $PDUelements[$key] = $value;
#echo print_r($PDUelements); // debug

# define array for hold the return output of encode function
$output=array();

# call the encode function with the list of parameters array and cache the return output (array)
$output=$SMSencode->encode($PDUelements);
#echo print_r($output); // debug

# print the return output of encode function
echo $output['byte_size']." ".$output['message']."\n";
?>
