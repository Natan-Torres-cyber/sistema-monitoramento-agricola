<?php
namespace DAL;

use PDO;

class Conexao {
    private static $dbNome = 'curricularizacao';
    private static $dbHost = 'localhost';
    private static $dbUsuario = 'root';
    private static $dbSenha = '';

    private static $cont = null;

    public static function conectar() 
    {
        if (self::$cont == null) {
            try {
                self::$cont = new PDO(
                    "mysql:host=" . self::$dbHost . ";dbname=" . self::$dbNome . ";charset=utf8mb4",
                    self::$dbUsuario,
                    self::$dbSenha
                );
                
                self::$cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$cont->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (\PDOException $exception) {
                die("Erro ao conectar no banco: " . $exception->getMessage());
            }
        }

        return self::$cont;
    }

    public static function desconectar() 
    {
        self::$cont = null;
        return self::$cont;
    }
}
?>