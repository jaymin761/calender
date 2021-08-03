<?php

namespace App\Repositories;

interface IUserRepository
{
        public function getAllUsers();
        public function userInsert($request);
        public function userEdit($id);
        public function userUpdate($request,$id);
        public function userDelete($id);
}
?>
