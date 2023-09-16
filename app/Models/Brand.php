<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    private static $brand;
    private static $imageFile,$imageName,$imageDirectory,$imageUrl;
    protected $fillable = ['name','description','image','status'];

    public static function newBrand($request)
    {
        self::$brand                      = new Brand();
        self::$brand->name                = $request->name;
        self::$brand->description         = $request->description;
        self::$brand->image               = self::getImageUrl($request);
        self::$brand->status              = $request->status;
        self::$brand->save();

    }

    public static function getImageUrl($request)
    {
        self::$imageFile = $request->file('image');
        self::$imageName =time().rand(10,1000). self::$imageFile->getClientOriginalName();
        self::$imageDirectory = 'upload/brand-image/';
        self::$imageFile->move(self::$imageDirectory,self::$imageName);
        self::$imageUrl=self::$imageDirectory.self::$imageName;
        return self::$imageUrl;
    }


    public static function updateBrand($request,$id)
    {
        self::$brand =Brand::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$brand->image))
            {
                unlink(self::$brand->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$brand->image;
        }
        self::$brand->name            = $request->name;
        self::$brand->description     = $request->description;
        self::$brand->image           = self::$imageUrl;
        self::$brand->status          = $request->status;
        self::$brand->save();
    }

    public static function deleteBrand($id)
    {
        self::$brand =Brand::find($id);
        if(file_exists(self::$brand->image))
        {
            unlink(self::$brand->image);
        }
        self::$brand->delete();
    }
}
