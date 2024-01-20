<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stationary;
use App\Models\Category;
use Inertia\Inertia;
use Illuminate\Support\Facades\Crypt;

class StationaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        
            $stationaries = new Stationary();
            $all_stationaries  = $stationaries->getAllStationaries();
            $catg_names = $stationaries->getAllCategories();
            // dd($catg_names);
             return inertia('StationaryLists', [
                'stationaries' => $all_stationaries->through(fn ($stationary) => [
                    'stationaryId' =>encrypt($stationary->id),
                    'item' => $stationary->item,
                    'category' => $stationary->category,
                    'description' => $stationary->description,
                    'price' => $stationary->price,
                    'owner' => $stationary->owner,
                    'cond' => $stationary->cond,
                    'type' => $stationary->type,
                    'address' => $stationary->address,
                    'phone' => $stationary->phone,
                    'photo' => $stationary->photo
                ]), 'categories' => $catg_names->map(fn ($catg) => [
                    'id' =>encrypt($catg->id),
                    'item' => $catg->item,
                    'category' => $catg->category,
                    'description' => $catg->description,
                    'price' => $catg->price,
                    'owner' => $catg->owner,
                    'cond' => $catg->cond,
                    'type' => $catg->type,
                    'address' => $catg->address,
                    'phone' => $catg->phone,
                    'photo' => $catg->photo
                ]), 
                ]);
       
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories = new Stationary();
        $all_categories = $categories->getCategories();
        return Inertia::render('CreateStationary', ['categories' => $all_categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'item'=>'required',
            'category'=>'required',
            'desc'=>'required',
            'price'=>'required|numeric',
            'owner'=>'required',  
            'cond' => 'nullable|numeric',
            'type' => 'nullable|numeric',
            'address' => 'nullable|string|max:1024',
            'phone' => 'nullable|numeric',
        ]);

    
        
        $img = $request->file('photo');
        $filePath = $img->store('items', 'public');
        $item_image = asset('storage/' . $filePath);
        $n_stationary = new Stationary();
        $n_stationary->store($request,$item_image);
        // dd($item_image);
        return redirect('/stationary'); //return route
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd($id);

        try {
            $itemId = Crypt::decrypt($id);
        } catch (Exception $e) {
            abort(404);
        }
        $stationaries = new Stationary();
        $editStationary = $stationaries->findStationaryById($itemId);
        $categories = $stationaries->getCategories();

        if ($editStationary == null) {
            return Redirect::route('stationary.index');
        } else {
        
            return inertia("EditStationary", ['editStationary'=>$editStationary, 'categories'=>$categories]);
        }

        // $stationaries = new Stationary();
        // $editStationary = $stationaries->findStationaryById($id);
        // if ($editStationary == null) {
        //     return Redirect::route('stationary.index');
        // }else{
        //     return Inertia('EditStationary',[
        //         'editStationary'=>$editStationary
        //        ]);
        //     }
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $u_stationary = new Stationary();
        $u_stationary->updateStationary($request, $id);
        return redirect('/stationary');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);
        $d_stationary = new Stationary();
        $d_stationary->deleteStationary($id);
        return redirect('/stationary');    }
}
