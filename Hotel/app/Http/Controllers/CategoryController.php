<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    //
    protected $catRepo;

    public function __construct(CategoryRepositoryInterface $catRepo){
        $this->catRepo = $catRepo;
    }

    public function index(){
        $cats = $this->catRepo->getAll();
        return view('admin.category.index', compact('cats'));
    }


}
