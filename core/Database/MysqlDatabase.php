<?php
namespace Core\Database;
use \PDO;
class MysqlDatabase extends Database{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name,$db_user='root',$db_pass='',$db_host='localhost'){
        $this->db_name=$db_name;
        $this->db_user=$db_user;
        $this->db_pass=$db_pass;
        $this->db_host=$db_host;
    }
    //cete fonction permet la connexion avec PDO
    public function getPDO(){
        if($this->pdo===null){
            $pdo=new PDO('mysql:dbname=projet_fin_cycle;host=localhost;','root','');
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->pdo=$pdo;
        }

        return $this->pdo;
    }
    //cette fonction concerne le traitement des requetes les UPDATE INSERT DELETE
    public function query($statement,$class_nam=null,$one=false){
        $req=$this->getPDO()->query($statement);
         if (
            strpos($statement,'UPDATE')=== 0 ||
            strpos($statement,'INSERT')=== 0 ||
            strpos($statement,'DELETE')=== 0 
        ) {
           return $req;
        }
        if($class_nam===null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(PDO::FETCH_CLASS,$class_nam);
        }
        if($one){
            $datas=$req->fetch();
        }else{
            $datas=$req->fetchAll();
        }
        return $datas;
    }
    public function lastInsertId(){
        return $this->getPDO()->lastInsertId();
    }

    /**
     * @param $statement
     * @param $attributes
     * @param $class_nam
     * @return array
     */
    public function prepare($statement, $attributes, $class_nam=null,$one=false){
        $req=$this->getPDO()->prepare($statement);
        $res=$req->execute($attributes);
        if (
            strpos($statement,'UPDATE')=== 0 ||
            strpos($statement,'INSERT')=== 0 ||
            strpos($statement,'DELETE')=== 0 
        ) {
           return $res;
        }
         if($class_nam===null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(PDO::FETCH_CLASS,$class_nam);
        }
        if ($one){
            $datas=$req->fetch();
        }else{
            $datas=$req->fetchAll();
        }

        return $datas;
    }

}