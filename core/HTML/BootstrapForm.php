<?php 
namespace Core\HTML;
class BootstrapForm extends Form{
	//cette fonction permet une utilisation plus simple des input avec les formulaires en utlisant Bootstrap
 	public function input($nom,$label,$options=[]){
 		 $type=isset($options['type']) ? $options['type'] :'text';
 		 $label='<label>'.$label.'</label>';
 		 if($type==='textarea'){
 		 	$input='<textarea  name="'.$nom.'" class="form-control">' .$this->getValue($nom).'</textarea>';
 		 }else{
 		 	$input='<input type="'.$type.'" name="'.$nom.'" value="'.$this->getValue($nom).'" class="form-control">';
 		 }
         return  $this->surround($label.$input);
     }
     protected function surround($html){
     	return "<div class=\"form-group\">{$html}</div>";
     }
     public function submit(){
        return  $this->surround('<button type="submit" class="btn btn-primary">Envoyer</button>');
    }
    public function select($nom,$label,$options){
    	$label='<label>'.$label.'</label>';
    	$input='<select class="form-control" name="'.$nom.'">';
    	foreach ($options as $k=> $v) {
    		$attributes='';
    		if($k== $this->getValue($nom)){
    			$attributes='selected';
    		}
    		$input.="<option value='$k' $attributes>$v</option>";
    	}
    	$input.='</select>';
    	 return  $this->surround($label.$input);
    }
}
 ?>
