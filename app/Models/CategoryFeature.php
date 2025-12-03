<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryFeature extends Model
{
    protected $table = "category_features";

    protected $fillable = [
        'category_id',
        'feature_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }
}
