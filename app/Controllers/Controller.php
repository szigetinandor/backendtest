<?php
namespace App\Controllers;

class Controller {

    public function notFound() {
        header("Content-Type: application/json", true, 404);
    }

    public function wrongMethod() {
        header("Content-Type: application/json", true, 405);
    }
}