<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;

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
    public function login()
    {
        loadView('users/login');
    }

    /**
     * Shoe register page
     */

    public function create()
    {
        loadView('users/create');
    }

    /**
     * Store user in database
     * 
     */
    public function store()
    {
        $name = sanitize($_POST['name']);
        $email = sanitize($_POST['email']);
        $city = sanitize($_POST['city']);
        $state = sanitize($_POST['state']);
        $password = sanitize($_POST['password']);
        $confirmationPassword = sanitize($_POST['confirmation_password']);

        $errors = [];

        // Validation
        if (!Validation::email($email)&& !Validation::string($email, 2)) {
            $errors['email'] = 'Please enter a valid email address';
        }

        if (!Validation::string($name, 2, 50)) {
            $errors['name'] = 'Name must be between 2 and 50 characters';
        }

        if (!Validation::alfa($name)) {
            $errors['name'] = 'The field name cannot contain numbers';
        }

        if (!Validation::alfa($city)) {
            $errors['city'] = 'The field city cannot contain numbers';
        }

        if (!Validation::alfa($state)) {
            $errors['state'] = 'The field state cannot contain numbers';
        }

        if (!Validation::string($password, 6, 50)) {
            $errors['password'] = 'Password must be at least 6 characters';
        }

        if (!Validation::match($password,  $confirmationPassword)) {
            $errors['confirmation_password'] = 'Passwords do not match';
        }

        if (!empty($errors)) {
            loadView('users/create', [
                'errors' => $errors,
                'user' => [
                    'name' => $name,
                    'email' => $email,
                    'city' => $city,
                    'state' => $state,
                ]
            ]);
            exit;
        }

        // Check if email exists
        $params = [
            'email' => $email
        ];

        $user = $this->db->query('SELECT * FROM users WHERE email = :email', $params)->fetch();

        if ($user) {
            $errors['email'] = 'That email already exists';
            loadView('users/create', [
                'errors' => $errors
            ]);
            exit;
        }

        // Create user account
        $params = [
            'name' => $name,
            'email' => $email,
            'city' => $city,
            'state' => $state,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        $this->db->query('INSERT INTO users (name, email, city, state, password) VALUES (:name, :email, :city, :state, :password)', $params);

        // Get new user ID
        $userId = $this->db->conn->lastInsertId();

        // Set user session
        Session::set('user', [
            'id' => $userId,
            'name' => $name,
            'email' => $email,
            'city' => $city,
            'state' => $state
        ]);
        //inspectAndDie(Session::get('user'));
        redirect('/');
    }

    /**
     * Logout and kill session
     * 
     * @return void
     */

    public function logout()
    {
        Session::clearAll();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 86400, $params['path'], $params['domain']);

        redirect('/');
    }

    /**
     * Login User with email and password
     * 
     * @return void
     */

    public function autenticate()
    {
        $email = sanitize($_POST['email']);
        $password = sanitize($_POST['password']);

        //Validation
        $errors = [];
        if (!Validation::email($email)) {
            $errors['email'] = 'Please enter a valid email';
        }

        if (!Validation::string($password, 6)) {
            $errors['password'] = 'Password must be at leas 6 characters';
        }

        if (!empty($errors)) {
            loadView('users/login', [
                'errors' => $errors
            ]);
            exit;
        }

        //Cheack for email
        $params = [
            'email'=> $email
        ];

        $user = $this->db->query('SELECT * FROM users WHERE email = :email', $params)->fetch();

        if (!$user) {
            $errors['email'] = 'Incorect Credentials';
            loadView('users/login', [
                'errors' => $errors
            ]);
            exit;
        }

        //check if password is corect

        if (!password_verify($password, $user->password)) {
            $errors['email'] = 'Incorect Credentials';
            loadView('users/login', [
                'errors' => $errors
            ]);
            exit;
        }

         // Set user session
         Session::set('user', [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'city' => $user->city,
            'state' => $user->state
        ]);
        redirect('/');

    }
}
