<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
  public function homepage(): Response
  {
    return new Response('<html>
    <head></head>
    <body>TEST</body>
    </html>');
  }

  public function contact(): Response
  {
    return new Response('<html>
    <head></head>
    <body>TEST</body>
    </html>');
  }
}