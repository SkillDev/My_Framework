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
namespace gamos;
use \app\controllers;
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
Class Core
{
    /**
    * AUTOLOAD
    *
    * @return void
    */
    public static function run()
    {
        spl_autoload_register('self::registerAutoload');

        if (isset($_GET['page'])) { 

            $page = $_GET['page'];
            $explode = explode("/", $page);
            $controller = $explode[0];
            $file = ucfirst($controller) . "Controller.php";
            $chemin = "../app/controllers/" . $file;

            if (is_file($chemin)) {
                // include $chemin;

                if (isset($explode[1])) {
                    $methode = $explode[1];
                    $new = ucfirst($controller) . "Controller";
                    $cheminOfController = '\app\controllers\\' . $new;
                    $objet = New $cheminOfController;
                    $fonction = $methode . "Action";
                    if (method_exists($objet, $fonction)) {
                        $objet->$fonction();
                    } else {
                        echo "La methode " . $methode . "Action n'existe pas !";// faire une page 404 !!!!!
                    }
                }
            } else {
                echo "Le controller " . $file . " n'existe pas !";// faire une page 404 !!!!
            }
        }
    }
    /**
    * Process the return comment of this function comment.
    *
    * @param string $className nom de la class  
    *
    * @return void
    */
    public static function registerAutoload($className)
    {
        $className = str_replace("\\", "/", $className);
        $className = dirname(__FILE__) . "/../../" . $className . ".php";
        include $className;
    }
}
?>