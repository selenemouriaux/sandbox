<?php

var_dump($_POST);
//array_key_exists('prénom', $_GET) ? $firstname=$_GET['prénom'] : $firstname='tout le monde';

$firstname = $_POST['prénom'] ?? 'tout le monde';
// works with isset() as true

include 'hello.phtml'; // links to its template
