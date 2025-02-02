<?php

namespace App\Models;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use HasFactory;

class Category extends Model
{
    public function services()
    {
        return $this->hasMany(Service::class);
    }


    // Specify the fillable fields
    protected $fillable = [
        'name',
        'description',
    ];

}
