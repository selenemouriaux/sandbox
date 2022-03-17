<?php

if (array_key_exists('ajax', $_GET)) {
  include './appli/get.phtml';
} else {
  $template = 'get';
  include './appli/base.phtml';
}
