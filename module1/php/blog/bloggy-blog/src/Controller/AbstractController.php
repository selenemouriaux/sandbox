<?php

namespace App\Controller;

use App\Framework\Flashbag;

class AbstractController
{
  /** @var Flashbag */
  protected Flashbag $flashbag;

  public function __construct()
  {
    $this->flashbag = new Flashbag();
  }
}