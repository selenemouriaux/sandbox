<?php

const FILEPATH = './newsletterSubs.csv';
$newsletterSubs = getListFromCsv(FILEPATH) ?? null;
$error = null;

function getListFromCsv($filePath)
{
    $subs = [];
    $emails = fopen($filePath, "a+");
    while ($data = fgetcsv($emails)) {
        $subs[] = $data[0];
    }
    fclose($emails);
    return $subs;
}

function addToCsvFile($email, $filePath)
{
    $emails = fopen($filePath, "a");
    fputcsv($emails, [$email]);
    fclose($emails);
}

function isNotRegisteredYet($email, $filePath)
{
    $arr = getListFromCsv($filePath);
    if (in_array($email, $arr)) {
        $GLOBALS['error'] = "Impossible, cet email est déjà utilisé.";
    }
    return in_array($email, $arr);
}

function processSubmission($sub)
{
    if (preg_match("#^[a-zéàè\-\.]{1,20}[@][a-zéèà\-]{1,20}[\.][a-zéàè]{2,3}([\.][a-zéèà]{0,3})?$#", $sub)) {
        return trim($sub);
    } elseif (empty($sub)) {
        $GLOBALS['error'] = "Merci de renseigner un email";
    } else {
        $GLOBALS['error'] = "Format d'email invalide";
    }
    return null;
}

if ($_POST) {
    $error = null;
    if ($email = processSubmission($_POST['email'])) {
        !isNotRegisteredYet($email, FILEPATH) ?
            addToCsvFile($email, FILEPATH) : null;
        $newsletterSubs = getListFromCsv(FILEPATH);
    }
}

include 'persitent-contacts.phtml';