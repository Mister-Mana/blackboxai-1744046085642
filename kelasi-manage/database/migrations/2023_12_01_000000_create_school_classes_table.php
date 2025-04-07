<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolClassesTable extends Migration
{
    public function up()
    {
        Schema::create('school_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('section')->nullable();
            $table->integer('capacity')->default(30);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('school_classes');
    }
}