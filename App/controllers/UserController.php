<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;

class UserController
{
    protected $db;
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * Show log in page
     * @return vodi
     */
    public function login() {
        loadView('users/login');
    }

    /**
     * Shoe register page
     */

    public function create() {
        loadView('users/create');
    }
}
