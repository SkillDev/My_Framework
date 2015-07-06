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
namespace app\controllers;
use \app\models\UserTable;
use \lib\gamos\Controller;
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
Class IndexController extends Controller
{
    /**
    * Process the return comment of this function comment.
    *
    * @return void
    */
    public function indexAction()
    {
        // echo pathinfo(__FILE__, PATHINFO_FILENAME) . '.php';
        $u = New UserTable;
        $find = $u->findOne('login = ?', array('anton_m'));
        $this->render('IndexController:index', $find);
    }
}
?>