
<?php
/**
 * Clase para manejar eventos de autenticación de usuarios
 * @package UserMgmt_Auth
 */
class Auth {

    /**
     * Destruye la sesión activa
     * @access public
     * @return void
     */
    public function logout(){
        session_unset();
        session_destroy();
    }

    /**
     * Registra usuario en la sesión
     * @param type Object($usuario)
     * @access public
     * @return Object
     */
    public function login($usuario) {
        $_SESSION['usuario'] = $usuario;
    }

    /**
     * Devuelve el usuario registrado en la sesión
     * @access public
     * @return Object
     */
    public function usuario() {
        return $_SESSION['usuario'];
    }

    /**
     * Comprueba si hay sesión iniciada
     * @access public
     * @return boolean
     */
    public function check() {
        return (isset($_SESSION['usuario']));
    }


/**
 * Constructor del usuario
 * @access public
 * @return Object
 */
    public function __construct() {
    }

/**
 * Devvuelve id de usuario
 * @access public
 * @return integer
 */
    public function getId() {
        return $this->id;
    }


/**
 * Devuelve nombre usuario
 * @access public
 * @return String
 */
    public function getNomUsuario() {
        return $this->nomUsuario;
    }

/**
 * Cambia la propiedad nomUsuario del objeto
 * @param type String
 * @access public
 * @return void
 */
    public function setNomUsuario($nomUsuario) {
        $this->nomUsuario = $nomUsuario;
    }


/**
 * Devuelve clave usuario
 * @access public
 * @return String
 */
    public function getClave() {
        return $this->clave;
    }

/**
 * Cambia la propiedad clave del objeto
 * @param type String
 * @access public
 * @return void
 */
    public function setClave($clave) {
        $this->clave = $clave;
    }

/**
 * Añade objeto a la base de datos
 * @access public
 * @return void
 */
    public function persist() {
        $bd = BD::getConexion();
        $sqlInsertUsuario = "insert into usuarios (nomUsuario, clave) values (:nomUsuario, :clave)";
        $sthSqlInsertUsuario = $bd->prepare($sqlInsertUsuario);
        $result = $sthSqlInsertUsuario->execute([":nomUsuario" => $this->nomUsuario, ":clave" => $this->clave]);
        $this->id = (int) $bd->lastInsertId();
    }
}
