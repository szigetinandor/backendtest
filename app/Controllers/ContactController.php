<?php
namespace App\Controllers;

use App\Models\Contact;
use Exception;

class ContactController extends Controller {

    private Contact $contact;

    public function __construct() {
        $this->contact = new Contact();
    }

    public function get($id) {
        $result = $this->contact->get($id);
        header("Content-Type: application/json");
        if(empty($result)) {
            http_response_code(404);
            echo json_encode(["message" => "Contact does not exist"]);
        }
        else echo json_encode($result[0]);
    }

    public function all() {
        $result = $this->contact->all();
        header("Content-Type: application/json");
        echo json_encode($result);
    }

    public function add() {
        $json = file_get_contents('php://input');
        $attributes = json_decode($json, true);
        try {
            $this->contact->add($attributes);
            header("Content-Type: application/json", true, 201);
        } catch (Exception $e) {
            header("Content-Type: application/json", true, 400);
            echo json_encode(["message" => $e->getMessage()]);
        }
    }

    public function update($id) {
        $json = file_get_contents('php://input');
        $attributes = json_decode($json, true);
        try {
            $this->contact->update($id, $attributes);
            header("Content-Type: application/json", true, 204);
        } catch (Exception $e) {
            header("Content-Type: application/json", true, 400);
            echo json_encode(["message" => $e->getMessage()]);
        }

    }
}