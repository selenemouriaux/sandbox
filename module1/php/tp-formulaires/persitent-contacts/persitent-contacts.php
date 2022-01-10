<?php

function accessOrCreate($filePath) {
    $emails = fopen($filePath, "a+");
    return $emails;
}
$emails = accessOrCreate('./newsletterSubs.csv');
$newsletterSubs = fgetcsv($emails);

$newSub = $_POST['email'] ?? null;
$newSub ? $newsletterSubs[] = $newSub : null;
fclose($emails);


include 'persitent-contacts.phtml';