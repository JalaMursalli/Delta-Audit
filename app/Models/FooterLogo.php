<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterLogo extends Model
{
    use HasFactory;
    protected $fillable = [
        'description_az',
        'description_en',
        'description_ru',
        'image',
    ];
    public function getDescriptionAttribute(){
        return $this->getAttribute('description_'.app()->getLocale());
    }

}
