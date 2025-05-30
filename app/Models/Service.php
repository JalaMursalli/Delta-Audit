<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_az',
        'title_en',
        'title_ru',
        'short_description_az',
        'short_description_en',
        'short_description_ru',
        'description_az',
        'description_en',
        'description_ru',
        'image',
        'icon'
    ];
    public function getTitleAttribute(){
        return $this->getAttribute('title_'.app()->getLocale());
    }
    public function getShortDescriptionAttribute(){
        return $this->getAttribute('short_description_'.app()->getLocale());
    }
    public function getDescriptionAttribute(){
        return $this->getAttribute('description_'.app()->getLocale());
    }
    public function applies(){
        return $this->hasMany(ContactApply::class,'service_id');
    }
}
