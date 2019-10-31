<?php
    session_start();

    //Flash message helper
    function flash($name ='' , $message = '', $class='alert alert_success') {
          if(!empty($name)) {
              if(!empty($message) && empty($_SESSION[$name])) {
                if(!empty($_SESSION[$name])) {
                    unset($_SESSION[$name]);
                }
                
                if(!empty($_SESSION[$name. '_class'])) {
                    unset($_SESSION[$name. '_class']);
                }


                  $_SESSION[$name] = $name;
                  $_SESSION[$name. '_class'] = $class;

              } elseif(empty($message) && !empty($_SESSION[$name])) {
                $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '' ;
                echo '<div class=" '.$class . '" id="mgs-flash">'.$_SESSION[$message]. '</div> ';
                unset($_SESSION[$name]);
                unset($_SESSION[$name. '_class']);
              }
          }
    }