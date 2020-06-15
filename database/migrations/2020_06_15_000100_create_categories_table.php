<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->unsignedBigInteger('status_id')->unsigned()->index();
                $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->unsignedBigInteger('created_user_id');
                $table->foreign('created_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('updated_user_id');
                $table->foreign('updated_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
