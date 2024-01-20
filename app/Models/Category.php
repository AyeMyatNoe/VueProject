<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    public function getAllCategories(){
        return Category::where ('del_flg',0)->get();
    }
    public function store($request){
        // dd($request);
        $n_catg = new Category();
        $n_catg->category = $request->category;
        $n_catg->save();
    }
    public function findCategoryById($id){
        return Category::find($id);
    }
    public function updateCategory($request, $id){
        $new_catg = Category::find($id);
        $new_catg->category = $request->category;
        $new_catg->save();
    }
    public function deleteCategory($id)
    {
        $d_catg = Category::find($id);
        $d_catg->del_flg = 1;
        $d_catg->save();
    }
}

    