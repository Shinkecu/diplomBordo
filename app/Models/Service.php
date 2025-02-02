<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function masters()
    {
        return $this->belongsToMany(Master::class, 'master_service');
    }
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        // Add other fields as necessary
    ];
}
