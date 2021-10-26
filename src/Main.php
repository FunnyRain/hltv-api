<?php

namespace FunnyRain;

const NEWS = 'https://www.hltv.org/';
const MATCHES = 'http://www.hltv.org/matches';
const RESULTS = 'https://www.hltv.org/results';
const EVENTS = 'https://www.hltv.org/events';
const STATS = 'https://www.hltv.org/stats';
const GALLERIES = 'https://www.hltv.org/galleries';
const FORUMS = 'https://www.hltv.org/forums';
const BETTING = 'https://www.hltv.org/betting/analytics';
const LIVE = 'https://www.hltv.org/live';
const FANTASY = 'https://www.hltv.org/fantasy';

// Not working [Error 502 • Bad gateway]
const SEARCH = 'https://www.hltv.org/search?query=';

class hltv {


  public $proxy = ['isUse' => false, 'data' => []];

  public function __construct() {
  }

  /**
   * You can connect your socks5 proxies 
   * @param array $proxy ['user', 'pass', 'ip', 'port']
   */
  public function settings(array $proxy = array()) {
    if (count($proxy) < 4) die('Only socks5 is supported!');

    if (!empty($proxy)) {
      $this->proxy['data'] = $proxy;
    }
  }

  /**
   * Load page
   * @param [type] $url Example: 'https://google.com' or MATCHES
   * @return void output html page
   */
  public function __load(string $url = NEWS) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

    if ($this->proxy['isUse']) {
      curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
      curl_setopt($ch, CURLOPT_PROXYUSERPWD, "{$this->proxy['data'][0]}:{$this->proxy['data'][1]}");
      curl_setopt($ch, CURLOPT_PROXY, $this->proxy['data'][2]);
      curl_setopt($ch, CURLOPT_PROXYPORT, $this->proxy['data'][3]);
    }

    $s = curl_exec($ch);
    curl_close($ch);

    if ($s) {
      echo $s;
    }
  }
}
