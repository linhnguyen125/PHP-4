<?php
namespace App\Repositories\Room;

interface RoomRepositoryInterface
{
    public function getAll();
    public function find($id);
    public function delete($id);
    public function create($attributes = []);
    public function update($id, $attributes = []);
    public function updateStatus($id, $status);
    public function get($num);
}