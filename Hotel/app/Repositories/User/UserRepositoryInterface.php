<?php
namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function getAll();
    public function find($id);
    public function delete($id);
}