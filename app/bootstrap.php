<?php

  // Load Config
  require_once 'config/config.php';

  //Load Helper
  require_once 'helpers/url_helper.php';
  // Autoload Core Libraries
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });
  
