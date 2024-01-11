<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name');
            $table->string('image');
            $table->timestamps(); // Created at and Updated at columns
            $table->softDeletes(); // Deleted at column for soft deletes
        });
    }
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}

