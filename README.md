# Unofficial HLTV Api

:pencil: Easy to use!

## Methods

  + methods are empty, but soon there will be something here!

## Installation

1. clone this repository

```bash
git clone https://github.com/FunnyRain/hltv-api.git
```

2. to use the library in your project, you need:
  

```php
  require_once 'autoload.php';

  use FunnyRain\hltv;

  class getMatches extends hltv {
    public function __construct() {
      print_r($this->__load(MATCHES));
    }
  }

  $app = new getMatches();
  // You can connect your socks5 proxies 
  $app->settings(['user', 'pass', 'ip', 'port'])
  ```

## Examples 

[see examples](tests/)
