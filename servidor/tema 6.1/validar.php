<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);


//$ldapURI = "ldap://raspi.local:389";
$ldapURI = "ldap://logaran.tplinkdns.com:389/";
//Autentificacion del formulario
$ldap_name = "uid=".$_POST["name"].",ou=usuarios,dc=raspi,dc=ldap";
$ldap_password = $_POST["psw"];

$idConexion = ldap_connect($ldapURI) or die("No se ha podido realizar la conexión al servidor");
echo"Conexión realizada con éxito<br>";

if ($idConexion) {
    ldap_set_option($idConexion, LDAP_OPT_PROTOCOL_VERSION, 3);
    $ldapbind = ldap_bind($idConexion, $ldap_name, $ldap_password);
    if ($ldapbind) {
        echo"Conectado!!<br> Y, si, si has llegado hasta aquí tu sabes que Medac es una KK XD<br>";
    } else {
        echo "Error de autentificación: " . ldap_error($idConexion) ."<br>";
    }
} else {
    echo "Error en la conexión LDAP";
}

ldap_close($idConexion);
echo "Conexion cerrada!!";

?>