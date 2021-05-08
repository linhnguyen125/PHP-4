<?php
namespace App\Repositories\Room;

use App\Repositories\BaseRepository;

class RoomRepository extends BaseRepository implements RoomRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Room::class;
    }

    public function getAll(){
        return $this->model->paginate(10);
    }

    public function updateStatus($id, $status){
        $result = $this->find($id);
        if ($result) {
            $result->update([
                'status' => $status
            ]);
            return $result;
        }
    }

    public function get($num){
        return $this->model->where('status', '1')->orderBy('price', 'desc')->take($num)->get();
    }

    public function getByCatID($id){
        return $this->model->where('category_id', $id)->get();
    }
}