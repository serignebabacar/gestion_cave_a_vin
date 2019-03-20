<?php

    use Core\Database\MysqlDatabase;
    use Core\Config;

    class App{
        public $title="Mon super site";
        private $db_instance;
        private static $instance;
        public static function getInstance(){
            if(is_null(self::$instance)){
                self::$instance=new App();
            }
            return self::$instance;
        }
        public static function load(){
            session_start();
            require  ROOT.'/core/Autoload.php';
            Core\Autoloader::register();
        }
       public function getTable($name){
           $class_name='\\App\\Table\\'.ucfirst($name).'Table';
           return new $class_name($this->getDb());
       }
       public function getDb(){
           $config=Config::getInstance(ROOT.'/config/config.php');
           if(is_null($this->db_instance)){
               $this->db_instance=new MysqlDatabase($config->get('db_name'),$config->get('db_user'),$config->get('db_pass'),$config->get('db_host'));
           }
          return $this->db_instance;
       }
     
    }