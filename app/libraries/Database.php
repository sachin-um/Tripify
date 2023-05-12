<?php
    class Database{
        private $host =DB_HOST;
        private $user=DB_USER;
        private $password=DB_PASSWORD;
        private $dbname=DB_NAME;

        private $dbh;
        private $statement;
        private $error;


        public function __construct()
        {
            $dsn='mysql:host='.$this->host.';dbname='.$this->dbname;

            $options=array(
                PDO::ATTR_PERSISTENT=>true,
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
            );

            try {
                $this->dbh=new PDO($dsn, $this->user,$this->password,$options );
            } catch (PDOException $th) {
                $this->error =$th->getMessage();
                // echo $this->error;
                redirect('Pages/errorpage');
            }
        }

        public function query($sql){
            $this->statement=$this->dbh->prepare($sql);

        }


        public function bind($param,$value,$type=NULL){
            if (is_null($type)) {
                switch (true) {
                    case is_int($value):
                        $type=PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type=PDO::PARAM_NULL;
                    case is_null($value):
                        $type=PDO::PARAM_NULL;
                        break;
                    default:
                        $type=PDO::PARAM_STR;
                } 
            }

            $this->statement->bindValue($param,$value,$type);
        }

        public function execute(){
            try {
                $this->statement->execute();
                return true;
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    return "duplicate";
                }
                 else {
                    return false;
                    
                }
            }
        }

        public function resultSet(){
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        }

        public function single(){
            $this->execute();
            return $this->statement->fetch(PDO::FETCH_OBJ);
        }

        public function rowCount(){
            return $this->statement->rowCount();
        }

        public function getLastId(){
            return $this->dbh->lastInsertId();
        }

    }



?>