<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactApply extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'service_id',
        'email',
        'text'
    ];

    public function service(){
        return $this->belongsTo(Service::class);
    }
}

