<?php
require_once('../vendor/autoload.php');
use App\Controllers\Controller;
use App\Controllers\ContactController;

$request = $_SERVER['REQUEST_URI'];
$uriParts =  explode('/', $request);

switch($uriParts[1]) {
    case 'contacts':
        $controller = new ContactController();
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            if(count($uriParts) == 2)
                $controller->all();
            else $controller->get($uriParts[2]);
        }
        elseif($_SERVER['REQUEST_METHOD'] == 'PUT') {
            if(count($uriParts) == 2)
                $controller->add();
            else $controller->update($uriParts[2]);
        }
        else $controller->wrongMethod();
        break;
    default:
        $controller = new Controller();
        $controller->notFound();
        break;
}

exit();
