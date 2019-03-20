<?php
namespace App\Entity;
use Core\Entity\Entity;
class VinEntity extends Entity{
    public function getUrl(){
    	return 'index.php?p=posts.show&id='.$this->id;
    }
    public function getExtrait(){
    	$html='<p>'.substr($this->contenu,0,100).'...</p>';
    	$html.='<p><a href="'.$this->getUrl() . '">Voir la Suite</a></p>';

    	return $html;
    }
}