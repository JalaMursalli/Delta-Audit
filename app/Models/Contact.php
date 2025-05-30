<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'title_az',
        'title_en',
        'title_ru',
        'sub_title_az',
        'sub_title_en',
        'sub_title_ru',
        'address_title_az',
        'address_title_en',
        'address_title_ru',
        'voen_title_az',
        'voen_title_en',
        'voen_title_ru',
        'email_title',
        'phone_title',
        'address_icon',
        'voen_icon',
        'email_icon',
        'phone_icon',
        'map'
    ];
    public function getTitleAttribute(){
        return $this->getAttribute('title_'.app()->getLocale());
    }
    public function getSubTitleAttribute(){
        return $this->getAttribute('sub_title_'.app()->getLocale());
    }
    public function getAddressTitleAttribute(){
        return $this->getAttribute('address_title_'.app()->getLocale());
    }
    public function getVoenTitleAttribute(){
        return $this->getAttribute('voen_title_'.app()->getLocale());
    }
}
