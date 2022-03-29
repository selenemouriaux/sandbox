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

  protected function render(string $template, array $aParams = [], string $sBase='base.phtml'):string
  {
    extract($aParams);
    unset($aParams);
    ob_start();
    include TEMPLATE_DIR . DIRECTORY_SEPARATOR . $sBase;
    return ob_get_clean();
  }
}