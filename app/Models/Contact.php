<?php
namespace App\Models;

class Contact extends Model {
    protected $table = 'contacts';
    protected $required = ['name', 'email', 'tel', 'address'];
}