#!/usr/bin/php
<?php
// Klasse "PduFactory" zum Decodieren von SMS-PDUs einbinden
require_once('PduFactory/Pdu/PduFactory.php');
require_once('PduFactory/Pdu/Pdu.php');
require_once('PduFactory/Utf8/Utf8.php');
require_once('PduFactory/Exception/InvalidArgumentException.php');

// Erstelle neues Objekt der Klasse "PduFactory"
$SMSdecode = NEW Application\Pdu\PduFactory();

// Dekodiere die SMS PDU und wandle das PHP-Array in ein JSON-Objekt
$JSON_PDU = json_encode($SMSdecode->decode($argv[1]),JSON_UNESCAPED_UNICODE);

// JSON-Objekt ausgeben
echo $JSON_PDU;
?>
