<?php 
namespace Core\HTML;

 class Form{
     private $data;
     public $surround='p';
     public function __construct($data=array())
     {
            $this->data=$data;

     }
     public function input($nom,$label,$options=[]){
        $type=isset($options['type']) ? $options['type'] :'text';
         return  $this->surround('<input type="'.$type.'" name="'.$nom.'">');
     }
     public function password($nom){
         return  $this->surround('<input type="password" name="'.$nom.'">');
     }
    protected function surround($html){
        return " <{$this->surround}>{$html}</{$this->surround}>";
    }


    public function submit(){
        return  $this->surround('<button type="submit">Envoyer</button>');
    }
    public function date(){
        return new \graphicart\Date();
    }
    protected function getValue($index){
        if(is_object($this->data)){
            return $this->data->$index;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }
 }