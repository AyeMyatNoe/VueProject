<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stationary;
use Inertia\Inertia;

class StationaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stationaries = new Stationary();
        $all_stationaries  = $stationaries->getAllStationaries();
        return Inertia::render('StationaryLists',["stationaries"=>$all_stationaries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('CreateStationary');
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
            'owner'=>'required'  
        ]);
        $n_stationary = new Stationary();
        $n_stationary->store($request);
        // dd($n_stationary);
        return redirect('/stationary'); //return route
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $e_stationary = new Stationary();
        $editStationary = $e_stationary->findStationaryById($id);
        return Inertia::render('EditStationary',[
         'editStationary'=>$editStationary
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $u_stationary = new Stationary();
        $u_stationary->updateStationary($request, $id);
        return redirect('/stationary');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        $d_stationary = new Stationary();
        $d_stationary->deleteStationary($id);
        return redirect('/stationary');    }
}
