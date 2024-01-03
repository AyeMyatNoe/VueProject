<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Stationary extends Model
{
    use HasFactory;
    public function getAllStationaries(){
        return Stationary::where ('del_flg',0)->get();
    }
    public function store($request){
        // dd($request);
        $n_stationary = new Stationary();
        $n_stationary->item = $request->item;
        $n_stationary->category = $request->category;
        $n_stationary->description = $request->desc;
        $n_stationary->price = $request->price;
        $n_stationary->owner = $request->owner;
        $n_stationary->cond = $request->cond;
        $n_stationary->type = $request->type;
        $n_stationary->address = $request->address;
        $n_stationary->phone = $request->phone;
        $n_stationary->photo = $request->photo;
        $n_stationary->save();
        // dd($new_stationary);
    }
    public function updateStationary($request, $id){
        $new_stationary = Stationary::find($id);
        $new_stationary->item = $request->item;
        $new_stationary->category = $request->category;
        $new_stationary->description = $request->desc;
        $new_stationary->price = $request->price;
        $new_stationary->owner = $request->owner;
        $new_stationary->cond = $request->cond;
        $new_stationary->type = $request->type;
        $new_stationary->address = $request->address;
        $new_stationary->phone = $request->phone;
        $new_stationary->photo = $request->photo;
        $new_stationary->save();
    }
    public function findStationaryById($id){
        return Stationary::find($id);
        
    }
    public function deleteStationary($id)
    {
        $d_stationary = Stationary::find($id);
        $d_stationary->del_flg = 1;
        $d_stationary->save();
    }
}
