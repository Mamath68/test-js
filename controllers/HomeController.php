<?php

// Ouvre le namespace Controller
namespace Controllers;

// fait appel a Session dans le namespace Core
use Core\Session;
// fait appel a AbstractController dans le namespace Core
use Core\AbstractController;
// fait appel a ControllerInterface dans le namespace Core
use Core\ControllerInterface;

// class HomeController hérite de la classe AbstractController et implémente ControllerInterface.
class HomeController extends AbstractController implements ControllerInterface
{

    public function index()
    {
        return [
            "view" => VIEW_DIR . "home.php",
        ];
    }

    public function yugioh()
    {
        return [
            "view" => VIEW_DIR . "cart/yugioh.php"
        ];
    }

    public function magic()
    {
        return [
            "view" => VIEW_DIR . "cart/magic.php"
        ];
    }
}
