<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_az',
        'title_en',
        'title_ru',
        'description_az',
        'description_en',
        'description_ru',
        'image1',
        'image2',
    ];

    public function getTitleAttribute(){
        return $this->getAttribute('title_'.app()->getLocale());
    }

    public function getDescriptionAttribute(){
        return $this->getAttribute('description_'.app()->getLocale());
    }
}
