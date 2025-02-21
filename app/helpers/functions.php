<?php

/**
 * Functie voor het loggen van de errors die ontstaan door try-catch
 * De volgende zaken worden gelogd
 * - Errormessage van de fout
 * - datum en tijd wanneer de fout is opgetreden
 * - bestand waar de fout is opgetreden
 * - regelnummer van de fout
 * - method waarin de fout is opgetreden
 * - ip-adres van de veroorzaker van de fout
 */

function logger($line, $method, $file, $error)
{

    date_default_timezone_set('Europe/Amsterdam');
    $time = "Datum/tijd: " . date('d-m-Y H:i:s', time()) . "\t";
    $error = "De error is: " . $error . "\t";
    $remote_ip = "Remote IP-adres: " . $_SERVER['REMOTE_ADDR'] . "\t";
    $filename = "Filename: " . $file . "\t";
    $methodname = "Methodname: " . $method . "\t";
    $linenumber = "Linenumber: " . $line . "\t";
    $content = $time . $remote_ip . $error . $filename . $methodname . $linenumber . "\r";
    $pathToLogFile = APPROOT . "/logs/nonfunctionallog.txt";

    if (!file_exists($pathToLogFile)) {
        file_put_contents($pathToLogFile, "Non Functional Log\r");
    }


    file_put_contents($pathToLogFile, $content, FILE_APPEND);
}