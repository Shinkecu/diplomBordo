<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    public function services()
    {
        return $this->belongsToMany(Service::class, 'master_service');
    }
}
