<?php
/**
 * Clase que nos conecta a nuestra base de datos
 * en phpMyAdmin
 *
 * @package UserMgmt_Auth
 */
class BD {

    /**
     *  Nombre base de datos
     *
     *  @access private
     *  @var string
     * /
    private $basedatos = 'gestionusuarios';

    /**
     *  Usuario base de datos
     *
     *  @access private
     *  @var string
     * /
    private $usuario = 'root';

    /**
     *  Contraseña base de datos
     *
     *  @access private
     *  @var string
     * /
    private $contrasenya = '';

    /**
     *  Servidor base de datos
     *
     *  @access private
     *  @var string
     * /
    private $equipo = 'localhost';

    /**
     *  Objeto conexión
     *
     *  @access private
     *  @var object
     * /
    protected static $bd = null;


     /**
      * Constructor de conexion a base de datos
      *
      * @access protected
      * @return Object
      */
    private function __construct() {
        try {
            self::$bd = new PDO("mysql:host=$this->equipo;dbname=$this->basedatos", $this->usuario, $this->contrasenya);
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
            die();
        }
    }
/**
 * Conecta a la base de datos especificada arriba
 *
 * @return Object
 */
    public static function getConexion() {
        if (!self::$bd) {
            new BD();
        }
        return self::$bd;
    }

}
