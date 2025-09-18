#!/usr/bin/php
<?php

require_once('PduFactory/Pdu/PduFactory.php');
require_once('PduFactory/Pdu/Pdu.php');
require_once('PduFactory/Utf8/Utf8.php');
require_once('PduFactory/Exception/InvalidArgumentException.php');

$SMSencode = NEW Application\Pdu\PduFactory();

$longopts  = array(
    "format:",         // if set to 'json', a JSON string with the SMS parameters is expected in 'input'
    "input:",          // JSON string if “format” is set to json
    "message:",        // message content
    "number:",         // recipient's telephone number
    "smsc:",           // + means international
    "alphabetSize:",   // 7 -> Default (7bit), 8 -> 8bit, 16 -> UCS2 (16bit)
    "class:",          // "0 Flash ", "1 ME specific ", "2 SIM specific ", "3 TE specific "
    "typeOfAddress:",  // "145": international, "161": national, "129": unknown
    "validity:",       // 
    "receipt:",        // true/false
);

$args=array();
foreach(getopt("", $longopts) as $key => $value) $args[$key] = $value;

if (array_key_exists('format', $args) && $args['format'] == 'json' && $args['input'])
{
    $args += json_decode($args['input'],JSON_UNESCAPED_UNICODE);
}

$output=$SMSencode->encode($args);

if (array_key_exists('format', $args) && $args['format'] == 'json')
{
    echo json_encode($output,JSON_UNESCAPED_UNICODE)."\n";
}
else
{
    echo $output['byte_size']." ".$output['message']."\n";
}
?>
