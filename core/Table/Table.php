<?php
namespace Core\Table;
use Core\Database\Database;

class  Table{

    protected $table;
    protected $db;

    public function __construct(Database $db){
        $this->db=$db;
        if(is_null($this->table)){
            $parts=explode('\\',get_class($this));
            $class_name=end($parts);
            $this->table=strtolower(str_replace('Table','',$class_name));
        }

    }
    public function query($statement,$attributes=null,$one=false){
        if($attributes){
            return $this->db->prepare(
                $statement,
                $attributes,
                str_replace('Table','Entity',get_class($this)),
                $one
            );
        }else{
            return $this->db->query(
                $statement,
                str_replace('Table','Entity',get_class($this)),
                $one
            );
        }
    }
    public function find($id){
        return $this->query("SELECT * FROM {$this->table} WHERE id=?",[$id],true);
    }
    public function findVin($id){
        return $this->query("SELECT * 
        FROM  vin LEFT JOIN bouteille on vin.id=bouteille.id_vin
        WHERE vin.id=?",[$id],true);
    }
    public function update($id,$fiedls){
        $sql_parts=[];
        $attributes=[];
        foreach ($fiedls as $k => $v) {
            $sql_parts[]="$k= ?";
            $attributes[]=$v;
        }
         $attributes[]=$id;

         $sql_part=implode(',',$sql_parts);
        return $this->query("UPDATE {$this->table} SET  $sql_part WHERE id=?",$attributes,true);
    }
    public function all(){
      return   $this->query("SELECT * FROM {$this->table}");
    }
    public function extract($key,$value){
        $records=$this->all();
        $return=[];
        foreach ($records as $k => $v) {
           $return[$v->$key]=$v->$value;
        }
        return $return;
    }
     public function create($fiedls){
        $sql_parts=[];
        $attributes=[];
        foreach ($fiedls as $k => $v) {
            $sql_parts[]="$k= ?";
            $attributes[]=$v;
        }
        $sql_part=implode(',',$sql_parts);
        return $this->query("INSERT INTO  {$this->table} SET  $sql_part",$attributes,true);
    }
     public function delete($id){
        return $this->query("DELETE FROM  {$this->table} WHERE id= ?",[$id],true);
    }

}