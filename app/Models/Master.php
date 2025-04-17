<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $fillable = [
        'name', 'phone', 'position', 'experience', 'education', 'image'
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'master_service');
    }
}
