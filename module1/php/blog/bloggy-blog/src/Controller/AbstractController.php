<?php

namespace App\Controller;

use App\Framework\Flashbag;
use App\Framework\UserSession;
use App\Framework\Utils;

class AbstractController
{
  /** @var Flashbag */
  protected Flashbag $flashBag;
  /** @var Utils */
  protected Utils $utils;
  /** @var UserSession */
  protected UserSession $session;

  public function __construct()
  {
    $this->flashBag = new Flashbag();
    $this->utils = new Utils();
    $this->session = new UserSession();
  }
}