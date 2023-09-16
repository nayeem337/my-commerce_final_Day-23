<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $category;
    private static $imageFile,$imageName,$imageDirectory,$imageUrl;
    protected $fillable = ['name','description','image','status'];

    public static function newCategory($request)
    {
        self::$category                      = new Category();
        self::$category->name                = $request->name;
        self::$category->description         = $request->description;
        self::$category->image               = self::getImageUrl($request);
        self::$category->status              = $request->status;
        self::$category->save();

    }

    public static function getImageUrl($request)
    {
        self::$imageFile = $request->file('image');
        self::$imageName =time().rand(10,1000). self::$imageFile->getClientOriginalName();
        self::$imageDirectory = 'upload/category-image/';
        self::$imageFile->move(self::$imageDirectory,self::$imageName);
        self::$imageUrl=self::$imageDirectory.self::$imageName;
        return self::$imageUrl;
    }


    public static function updateCategory($request,$id)
    {
        self::$category =Category::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$category->image))
            {
                unlink(self::$category->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$category->image;
        }
        self::$category->name            = $request->name;
        self::$category->description     = $request->description;
        self::$category->image           = self::$imageUrl;
        self::$category->status          = $request->status;
        self::$category->save();
    }

    public static function deleteCategory($id)
    {
        self::$category =Category::find($id);
        if(file_exists(self::$category->image))
        {
            unlink(self::$category->image);
        }
        self::$category->delete();
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
