<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('title_az');
            $table->string('title_en');
            $table->string('title_ru');
            $table->string('sub_title_az')->nullable();
            $table->string('sub_title_en')->nullable();
            $table->string('sub_title_ru')->nullable();
            $table->string('address_title_az');
            $table->string('address_title_en');
            $table->string('address_title_ru');
            $table->string('voen_title_az');
            $table->string('voen_title_en');
            $table->string('voen_title_ru');
            $table->string('email_title');
            $table->string('phone_title');
            $table->text('address_icon');
            $table->text('voen_icon');
            $table->text('email_icon');
            $table->text('phone_icon');
            $table->text('map');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
