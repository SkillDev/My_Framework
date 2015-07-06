<?php
/**
*PHP version 5
*File doc comment
*@category Sniffer
*@package  Sniffer.Test
*@author   ANTON Maicmelan <maicmelan.anton@epitech.eu>
*@license  http://intra.epitech.eu  General Public License
*@link     http://intra.epitech.eu
*/
namespace lib\gamos;
use \PDO;
/**
*PHP version 5
*Class doc domment
*
*@category Sniffer
*@package  Sniffer.Test
*@author   ANTON Maicmelan <maicmelan.anton@epitech.eu>
*@license  http://intra.epitech.eu  General Public License
*@link     http://intra.epitech.eu
*/
Class Model
{
    private $_host;
    private $_dbname;
    private $_socket;
    private $_login;
    private $_password;
    protected static $pdo;
    /**
    * Process the return comment of this function comment.
    *
    * @return void
    */
    public function __construct()
    {
        try
        {
            $this->_host = 'localhost';
            $this->_dbname = 'framework';
            $this->_socket = '/home/anton_m/.mysql/mysql.sock';
            $this->_login = 'root';
            $this->_password = '';

            self::$pdo = new \PDO("mysql:host=" . $this->_host . ";dbname=" . $this->_dbname . ";unix_socket=" . $this->_socket, $this->_login, $this->_password);
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
    /**
    * Process the return comment of this function comment.
    *
    * @return void
    */
    public function getPdo()
    {
        return self::$pdo;
    }
    /**
    * Process the return comment of this function comment.
    *
    * @param string $where nom du champ  
    * @param string $table le lien que l'utilisateur ajoute  
    *
    * @return void
    */
    public function findOne($where,$table)
    {
        if (is_numeric($table[0])) {
            $table[0] = $table[0];
        } elseif (is_string($table[0])) {
            $table[0] = '"' . $table[0] . '"';
        }
        $search = str_replace('?', $table[0], $where);
        $search = str_replace('=', 'like', $search);
        $tableName = get_called_class();
        $tableName = substr($tableName, 11, -5);
        $tableName = strtolower($tableName);

        $base=self::$pdo;
        $requete = "SELECT * FROM " . $tableName . " where" . ' ' .  $search;
        $login_requete = $base->prepare($requete);
        $login_requete->execute();
        $find=$login_requete->fetch();
        return $find;
    }
}
?>