<?php

namespace Framework\Middleware;
use Framework\Session;

class Authorize {

     /**
    * Check if user is authnticated
    *
    *@return bool
    */

    public function isAuth() {
        return Session::has('user');
    }

   /**
    * Handle the users redirection / request
    *
    *@param string $role
    *@return bool
    */

    public function handle($role) {
        if ($role === 'guest' && $this->isAuth()) {
            return redirect('/');
        }
        else if($role === 'auth' && !$this->isAuth()) {
            return redirect('/auth/login');
        }

    }
}