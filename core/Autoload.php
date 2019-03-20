<?php
namespace Core;
class Autoloader{
    static function register(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }
   static private function autoload($class) {
   		if (is_file(ROOT.'/'.$class.'.php'))
    		require ROOT.'/'.$class.'.php';
    }
}