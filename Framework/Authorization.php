<?php

namespace Framework;

use Framework\Session;

class Authorization {
    /**
     * Check if current user is owner a listing/resource
     * 
     * @param int $resouceId
     * @return bool
     */

     public static function isOwner($resouceId) {
        $sessionUser = Session::get('user');

        if ($sessionUser !== null && isset($sessionUser['id'])) {
            $sessionUserId = (int)$sessionUser['id'];
            return $sessionUserId === $resouceId;
        }
        return false;
     }
}