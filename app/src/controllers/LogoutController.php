<?php
// Afin d'unset la variable globale $_SESSION, j'ouvre la session
session_start();

class LogoutController extends Controller{
    public function index(){
        unset($_SESSION["id"]);
        $this->header("/");
    }
}
?>