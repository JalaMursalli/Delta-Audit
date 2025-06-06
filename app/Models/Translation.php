<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'key',
        'value_az',
        'value_en',
        'value_ru'
    ];
    public function getValueAttribute(){
        return $this->getAttribute('value_'.app()->getLocale());
    }
}
