<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'service_id',
        'master_id',
        'date',
        'time',
        'customer_telephone',
    ];
    public function master()
    {
        return $this->belongsTo(Master::class, 'master_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
