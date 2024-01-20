<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Inertia\Inertia;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = new Category();
        $all_categories  = $categories->getAllCategories();
        return Inertia::render('CategoryList',["categories"=>$all_categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('AddCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $n_catg = new Category();
        $n_catg->store($request);
        return redirect('/category'); //return route
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $e_catg = new Category();
        $editCategory = $e_catg->findCategoryById($id);
        return Inertia::render('EditCategory',[
         'editCategory'=>$editCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $u_catg = new Category();
        $u_catg->updateCategory($request, $id);
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $d_catg = new Category();
        $d_catg->deleteCategory($id);
        return redirect('/category');    
    }
}

