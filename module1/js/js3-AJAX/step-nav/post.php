<?php

$username = "URSULE";
$password = "123456";

if (
  array_key_exists('username', $_POST)
  && array_key_exists('password', $_POST)
) {

  $connect = '';

  if (
    $_POST['username'] === $username
    && $_POST['password'] === $password
  ) {

    $connect = 'ok';
  }
}

if (array_key_exists('ajax', $_GET)) {
  include './appli/post.phtml';
} else {
  $template = 'post';
  include './appli/base.phtml';
}




