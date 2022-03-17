<?php

$contactList = array(
  [ 'firstName' => 'Ursule',    'phone' => '0102030405' ],
  [ 'firstName' => 'Joana',     'phone' => '0102233445' ],
  [ 'firstName' => 'Catherine', 'phone' => '0605455548' ]
);



// Sérialisation JSON de la liste des contacts
echo json_encode($contactList);
