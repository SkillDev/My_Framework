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
class Controller
{
    /**
    * Process the return comment of this function comment.
    *
    * @param string $view  le controller 
    * @param string $array tableau de donne   
    *
    * @return void
    */
    public function render($view,$array)
    {
        $explode = explode(":", $view);
        $Controller = $explode[0];
        $html = $explode[1];
        $html = str_replace("\\", "/", $html);
        $html = dirname(__FILE__) . "/../../app/views/" . $Controller . "/" .$html . ".html";
        $Controller = $explode[0];
        $Controller = str_replace("\\", "/", $Controller);
        $Controller = dirname(__FILE__) . "/../../app/controllers/" . $Controller . ".php";
        $str = file_get_contents($html);
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                $str = str_replace("{{ " . $key . " }}", $value, $str);
            }
        }
        echo $str;
        // include_once $Controller;
    }
}
?>