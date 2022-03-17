<?php

if (array_key_exists('ajax', $_GET)) {
  include './appli/home.phtml';
} else {
  $template = 'home';
  include './appli/base.phtml';
}
