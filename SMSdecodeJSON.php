#!/usr/bin/php
<?php

require_once('PduFactory/Pdu/PduFactory.php');
require_once('PduFactory/Pdu/Pdu.php');
require_once('PduFactory/Utf8/Utf8.php');
require_once('PduFactory/Exception/InvalidArgumentException.php');

$SMSdecode = NEW Application\Pdu\PduFactory();

$JSON_PDU = json_encode($SMSdecode->decode($argv[1]),JSON_UNESCAPED_UNICODE);

echo $JSON_PDU;
?>
