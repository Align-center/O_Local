<?php

class Deconnection {

    public static function deconnect() {

        unset($_SESSION['user']);

        session_destroy();

        header('Location: ./');
        exit;
    }
}