<?php
namespace App\Repositories\Staff;

interface StaffRepositoryInterface
{
    public function getAll();
    public function find($id);
    public function delete($id);
    public function update($id, $attributes = []);
}