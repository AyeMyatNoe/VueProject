<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;

class Stationary extends Model
{
    use HasFactory;
    protected $fillable = [
    'item', 'category', 'description', 'price', 'owner', 'cond', 'type', 'address', 'phone', 'photo', 'del_flg'
    ];

    public function getAllStationaries(){
        return Stationary::where ('del_flg',0)->paginate(10);
    }
    
    public function getCategories()
    {
        return DB::table('categories')
            ->where('del_flg', 0)
            ->get();
    }
    public function store($request,$item_image){
        dd($request);
        $n_stationary = new Stationary();
        $n_stationary->item = $request->item;
        $n_stationary->category = $request->category;
        // $n_stationary->c_name = $request->c_name;
        $n_stationary->description = $request->desc;
        $n_stationary->price = $request->price;
        $n_stationary->owner = $request->owner;
        $n_stationary->cond = $request->cond;
        $n_stationary->type = $request->type;
        $n_stationary->address = $request->address;
        $n_stationary->phone = $request->phone;
        $n_stationary->photo = $file->photo;
        $n_stationary->save();
        // dd($new_stationary);
    }
    public function updateStationary($request, $id){
        // dd($id);
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
    public function findStationaryById($itemId){
        return Stationary::find($itemId);
        
    }
    public function deleteStationary($id)
    {
        
        $d_id = Crypt::decrypt($id);;
        
        $d_stationary = Stationary::find($d_id);
        try {
            if ($d_stationary) {
                $d_stationary->del_flg = 1;
                $d_stationary->save();
            } else {
                Log::error("Stationary with ID $id not found.");
            }
        } catch (\Exception $e) {
            Log::error("Error deleting stationary with ID $id: " . $e->getMessage());
        }
    }
    public function getAllCategories()
    {
        return DB::table('stationaries')
            ->join('categories', 'stationaries.category', '=', 'categories.id')
            ->where('stationaries.del_flg', 0)
            ->get();
    }
}
