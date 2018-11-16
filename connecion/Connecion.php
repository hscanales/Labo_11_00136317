<?php
              //creamos la clase conexión
                class Connecion
                 {
                     /*Definimos la varible que tendran las credenciales de nuestra base de datos*/
                     private $user;
                     private $pass;
                     private $db;
                     private $host;

                     //variable que almacenara la instancia de la clase Connecion
                     private static $instance = null;

                     //variable que almacenara la conexión
                     private $cnx;

                     //Constructor de la clase
                     private function __construct() {

                       //cargamos las credenciales
                         Connecion::credenciales();

                        //con el objeto mysql abrimos la conexión a nuestra base de datos
                        //esta recibe como parámetros el nombre del host, usuario de base de datos, password de la base de datos, nombre de la base de datos
                         $this->cnx = new mysqli($this->host,$this->user,$this->pass,$this->db);

                         //verificamos si hubo error en la conexión
                         if($this->cnx->connect_errno)
                         {

                             echo $this->cnx->connect_errno;  // mostraremos el error
                         }
                     }

                     //Método para crear la instancia de la base datos
                     public static function getInstance()
                     {
                        //self hacemos referencia a una variable de tipo static, la cual es parte de la clase.
                         if(self::$instance == null)
                         {
                             self::$instance = new Connecion();
                         }
                         return self::$instance;
                     }

                     //cargamos las credenciales
                     private function credenciales()
                     {
                         $this->user="root";
                         $this->pass=""; //para el caso de los laboratorios
                         $this->db="labo11";
                         $this->host = "localhost";
                     }

                     //Obtenemos la conexión de la base de datos
                     public function getCnx()
                     {
                         return $this->cnx;
                     }
                     //Cerramos la conexión a la base de datos
                     public function close()
                     {
                         self::$instance=null;
                     }
                 }
              ?>