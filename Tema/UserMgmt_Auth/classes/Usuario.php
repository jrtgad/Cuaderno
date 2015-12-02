
<?php

require_once 'BD.php';

/**
 *  Clase para manejar eventos de usuario
 * @package UserMgmt_Auth
 */
class Usuario {

/**
 *  Id de usuario
 *  @access protected
 *  @var String
 * /
    protected $id;

    /**
 *  Nombre de usuario
 *  @access protected
 *  @var String
 * /
    protected $nombre;

 *  Clave de usuario
 *  @access protected
 *  @var String
 * /
    protected $clave;


/**
 * Recoge usuario de la base de datos
 * @param type string
 * @param type string
 * @return object
 */
    public static function getByCredencial($nombre, $clave) {
        $bd = BD::getConexion();
        $sql = 'select * from usuarios where nombre=:nombre and clave=:clave';
        $sthSql = $bd->prepare($sql);
        $sthSql->execute([":nombre" => $nombre, ":clave" => $clave]);
        $sthSql->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
        $usuarioObj = $sthSql->fetch();
        return $usuarioObj;
    }


/**
 * Constructor de objetos
 * @return object
 */
    public function __construct() {
    }

/**
 * Devuelve id
 * @return string
 */
    public function getId() {
        return $this->id;
    }


/**
 * Devuelve nombre de usuario
 * @return String
 */
    public function getNombre() {
        return $this->nombre;
    }


/**
 *  Cambia la propiedad nombre del usuario
 * @param type String
 * @return void
 */
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

/**
 * Devuelve la clave del usuario
 * @return String
 */
    public function getClave() {
        return $this->clave;
    }


/**
 * Cambia la propiedad clave del usuario
 * @param type string
 * @return void
 */
    public function setClave($clave) {
        $this->clave = $clave;
    }

/**
 * Inserta objeto usuario en la base de datos
 * @return void
 */
    public function persist() {
        $bd = BD::getConexion();
        $sql = "insert into usuarios (nombre, clave) values (:nombre, :clave)";
        $sthSql = $bd->prepare($sqlInsertUsuario);
        $result = $sthSql->execute([":nombre" => $this->nombre, ":clave" => $this->clave]);
        $this->id = (int) $bd->lastInsertId();
    }
}
