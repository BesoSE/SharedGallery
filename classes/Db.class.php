<?php 

class Db{
    
    
    private $host="localhost";
    private $dbname="sharedgallery";
    private $pwd="";
    private $user="root";
  

    

    private $dbh;
    private $stmt;
    private$error;

    private function __construct(){
        $dsn='mysql:host='.$this->host.';dbname='.$this->dbname;
        $options=array(
            PDO::ATTR_PERSISTENT=>true,
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION

        );

        try {
            $this->dbh=new PDO($dsn,$this->user,$this->pwd,$options);
        } catch (PDOException $err) {
            $this->error=$err->getMessages();
        }

    }

    public static function getInstance(){
        static $instance=null;
        if(null==$instance){
            $instance=new Db();
        }else{
            echo "Using exiting object";
        }
        return $instance;
    }

    public function query($query){
        $this->stmt=$this->dbh->prepare($query);
    }


    public function bind($param,$value,$type=NULL){
        if(is_null($type)){
            switch (true) {
                case is_int($value):
                   $type=PDO::PARAM_INT;
                    break;
                    case is_bool($value):
                        $type=PDO::PARAM_BOOL;
                    break;
                    case is_null($value):
                        $type=PDO::PARAM_NULL;
                    break;
                
                default:
                    $type=PDO::PARAM_STR;
                    break;
            }




        }

        $this->stmt->bindValue($param,$value,$type);


    }






    public function execute(){
        return  $this->stmt->execute();
    }

    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);


    }

    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }




}


?>