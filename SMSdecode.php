#!/usr/bin/php
<?php

require_once('PduFactory/Pdu/PduFactory.php');
require_once('PduFactory/Pdu/Pdu.php');
require_once('PduFactory/Utf8/Utf8.php');
require_once('PduFactory/Exception/InvalidArgumentException.php');

$longopts  = array(                     
    "pdu:",            // required value: PDU of a SMS
    "output:",         // output format: json (--output json)
);                                                                                   
                                                                                     
$args=array();                                                                       
                                                                                     
foreach(getopt("", $longopts) as $key => $value) $args[$key] = $value;

if (!(array_key_exists('pdu', $args))) {

    fwrite(STDERR, "missing required option --pdu\n");
    exit(1);

}

$SMSdecode = NEW Application\Pdu\PduFactory();
$decoded = $SMSdecode->decode($args['pdu']);

if (array_key_exists('output', $args) && $args['output'] == 'json') {

    $JSON_PDU = json_encode($decoded,JSON_UNESCAPED_UNICODE);
    echo $JSON_PDU."\n";

}
else
{
    foreach($decoded as $key => $value)
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
}
?>
