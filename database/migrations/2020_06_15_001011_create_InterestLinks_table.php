<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interest_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_details_id');
                $table->foreign('personal_details_id')->references('id')->on('personal_details')->onDelete('cascade');
            $table->unsignedBigInteger('interest_id');
                $table->foreign('interest_id')->references('id')->on('interests')->onDelete('cascade');
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
        Schema::dropIfExists('interest_links');
    }
}
