<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    private static $unit;
    //private static $imageFile, $imageName, $imageDirectory, $imageUrl;
    protected $fillable = ['name', 'description', 'code', 'status'];

    public static function newUnit($request)
    {
        self::$unit                = new Unit();
        self::$unit->name          = $request->name;
        self::$unit->code          = $request->code;
        self::$unit->description   = $request->description;

        self::$unit->status        = $request->status;
        self::$unit->save();

    }

//    public static function getImageUrl($request)
//    {
//        self::$imageFile = $request->file('image');
//        self::$imageName = time() . rand(10, 1000) . self::$imageFile->getClientOriginalName();
//        self::$imageDirectory = 'upload/brand-image/';
//        self::$imageFile->move(self::$imageDirectory, self::$imageName);
//        self::$imageUrl = self::$imageDirectory . self::$imageName;
//        return self::$imageUrl;
//    }


    public static function updateUnit($request, $id)
    {
        self::$unit = Unit::find($id);
        self::$unit->name          = $request->name;
        self::$unit->code          = $request->code;
        self::$unit->description   = $request->description;

        self::$unit->status        = $request->status;
        self::$unit->save();
    }

    public static function deleteUnit($id)
    {
        self::$unit = Unit::find($id);
        self::$unit->delete();
    }
}

