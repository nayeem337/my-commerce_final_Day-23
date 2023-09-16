<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

    use HasFactory;
    private static $subCategory;
    private static $imageFile,$imageName,$imageDirectory,$imageUrl;
    protected $fillable = ['name','description','image','status'];

    public static function newSubCategory($request)
    {
        self::$subCategory                      = new SubCategory();
        self::$subCategory->category_id         = $request->category_id  ;
        self::$subCategory->name                = $request->name;
        self::$subCategory->description         = $request->description;
        self::$subCategory->image               = self::getImageUrl($request);
        self::$subCategory->status              = $request->status;
        self::$subCategory->save();

    }

    public static function getImageUrl($request)
    {
        self::$imageFile = $request->file('image');
        self::$imageName =time().rand(10,1000). self::$imageFile->getClientOriginalName();
        self::$imageDirectory = 'upload/sub-category-image/';
        self::$imageFile->move(self::$imageDirectory,self::$imageName);
        self::$imageUrl=self::$imageDirectory.self::$imageName;
        return self::$imageUrl;
    }


    public static function updateSubCategory($request,$id)
    {
        self::$subCategory =SubCategory::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$subCategory->image))
            {
                unlink(self::$subCategory->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$subCategory->image;
        }
        self::$subCategory->category_id     = $request->category_id  ;
        self::$subCategory->name            = $request->name;
        self::$subCategory->description     = $request->description;
        self::$subCategory->image           = self::$imageUrl;
        self::$subCategory->status          = $request->status;
        self::$subCategory->save();
    }

    public static function deleteSubCategory($id)
    {
        self::$subCategory =SubCategory::find($id);
        if(file_exists(self::$subCategory->image))
        {
            unlink(self::$subCategory->image);
        }
        self::$subCategory->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
