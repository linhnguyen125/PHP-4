<?php
namespace App\Repositories\Staff;

use App\Repositories\BaseRepository;

class StaffRepository extends BaseRepository implements StaffRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Staff::class;
    }

    public function getAll(){
        return $this->model->paginate(10);
    }
}