<?php
// J'ouvre le namspace Core
namespace Core;

// j'ouvre la classe abstaite, AbstractController
abstract class AbstractController
{
    // Créée la fonction public index, qui redirige vers la page par défaut, dans le cas présent: home.php
    public function index()
    {
        return [
            "view" => VIEW_DIR . "home.php",
            "data" => null,
        ];
    }

    public function redirectTo($ctrl = null, $action = null, $id = null)
    {

        if ($ctrl != "home") {

            $url = $ctrl ? "?ctrl=" . $ctrl : "";

            $url .= $action ? "&action=" . $action : "";

            $url .= $id ? "&id=" . $id : "";

        } else
            $url = "/";

        header("Location: $url");

        die();

    }
    // Fonction imposant une restriction au role donnée.
    public function restrictTo($role)
    {
        // Vérifie le rôle de l'user
        if (!Session::getUser() || !Session::getUser()->hasRole($role)) {
            // redirige vers le dossier security et le fichier login
            $this->redirectTo("view", "home");
        }
        // retourne, rien du tout, du moins a première vue.
        return;
    }

}