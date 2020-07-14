<?php
    include_once('config.php');

    class testMaya
    {
        private $encript;
        private $name;
        private $lastname;
        private $country;
        private $answerUser;
        private $calification;

        public function __construct(){}

        public function test($encript,$name, $lastname, $country,$answerUser,$calification){
            $this->encript      = $encript;
            $this->name         = $name;
            $this->lastname     = $lastname;
            $this->country      = $country;
            $this->answerUser   = $answerUser;
            $this->calification = $calification;
        }

        //Accesadores
        public function getEncript() {return $this->encript;}
        public function getName() {return $this->name;}
        public function getLastName() {return $this->lastname;}
        public function getCountry() {return $this->country;}
        public function getAnswerUser() {return $this->answerUser;}
        public function getCal() {return $this->calification;}

        //Mutantes
        public function setEncript($encript){return $this->encript;}
        public function setName($name){return $this->name;}
        public function setLastName($lastname){return $this->lastname;}
        public function setCountry($country){return $this->country;}
        public function setAnswerUser($answerUser){return $this->answerUser;}
        public function setCal($calification){return $this->calification;}


        public function seeQuestion()
        {
            $objConexion = new Conexion();
            $sql = "SELECT * FROM questions";
            $resul = $objConexion->generarTransaccion($sql);
            return $resul;
        }

        public function seeAllUser()
        {
            $objConexion = new Conexion();
            $sql = "SELECT * FROM users where calification >=7 ";
            $resul = $objConexion->generarTransaccion($sql);
            return $resul;
        }

        public function seeUser($names)
        {
            $objConexion = new Conexion();
            $sql = "SELECT * FROM users WHERE cript='".$names."'";
            $resul = $objConexion->generarTransaccion($sql);
            return $resul;
        }

        public function insertUser(){
            $objConexion = new Conexion();
            $sql = "INSERT INTO users (cript,names,lastname,country,answerUser,calification) 
                    VALUES ('".$this->encript."','".$this->name."','".$this->lastname."','".$this->country."','".$this->answerUser."','".$this->calification."')";
            $resul = $objConexion->generarTransaccion($sql);
            return $resul;
        }

        public function updateCal($cal,$id)
        {
            $objConexion = new Conexion();
            $sql = "UPDATE users SET calification='".$cal."' WHERE id='".$id."'";
            $resul = $objConexion->generarTransaccion($sql);
            return $resul;
        }

    }
?>