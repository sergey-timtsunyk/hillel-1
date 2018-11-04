<?php
require_once 'User.php';

class DeserializerUser
{
    public static function do(string $serialise): ?User
    {
        $obj = unserialize($serialise);

        if ($obj instanceof User) {
            return $obj;
        }

        return null;
    }
}
