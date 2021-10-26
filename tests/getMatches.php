<?php
require_once __DIR__.'/../autoload.php';
ini_set('display_errors', 1);

use FunnyRain\hltv;
use const FunnyRain\MATCHES;

class getMatches extends hltv {
  public function __construct() {
    print_r($this->__load(MATCHES));
  }
}

new getMatches();