<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    private static $product;
    private static $imageFile,$imageName,$imageDirectory,$imageUrl;


    public static function newProduct($request)
    {
        self::$product                                 = new Product();
        self::$product ->category_id                   = $request->category_id;
        self::$product ->sub_category_id               = $request->sub_category_id;
        self::$product ->brand_id                      = $request->brand_id;
        self::$product ->unit_id                       = $request->unit_id;
        self::$product ->name                          = $request->name ;
        self::$product ->code                          = $request->code ;
        self::$product ->model                         = $request->model;
        self::$product ->stock_amount	               = $request->stock_amount	;
        self::$product ->regular_price                 = $request->regular_price;
        self::$product ->selling_price                 = $request->selling_price;
        self::$product ->short_description             = $request->short_description;
        self::$product ->long_description              = $request->long_description;
        self::$product ->image                         = self::getImageUrl($request);
        self::$product ->status                        = $request->status;
        self::$product ->save();
        return self::$product;

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


    public static function updateProduct($request,$id)
    {
        self::$product =Product::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$product->image;
        }
        self::$product ->category_id                   = $request->category_id;
        self::$product ->sub_category_id               = $request->sub_category_id;
        self::$product ->brand_id                      = $request->brand_id;
        self::$product ->unit_id                       = $request->unit_id;
        self::$product ->name                          = $request->name ;
        self::$product ->code                          = $request->code ;
        self::$product ->model                         = $request->model;
        self::$product ->stock_amount	               = $request->stock_amount	;
        self::$product ->regular_price                 = $request->regular_price;
        self::$product ->selling_price                 = $request->selling_price;
        self::$product ->short_description             = $request->short_description;
        self::$product ->long_description              = $request->long_description;
        self::$product ->image                         = self::$imageUrl;
        self::$product ->status                        = $request->status;
        self::$product ->save();
        return self::$product;
    }

    public static function deleteProduct($id)
    {
        self::$product =Product::find($id);
        if(file_exists(self::$product->image))
        {
            unlink(self::$product->image);
        }
        self::$product->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
//            one to one relationship
    public function SubCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function otherImages()
    {
        return$this->hasMany(OtherImage::class);
        //one to many
    }
}
