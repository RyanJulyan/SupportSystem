<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_details_id');
                $table->foreign('personal_details_id')->references('id')->on('personal_details')->onDelete('cascade');
            $table->unsignedBigInteger('document_id');
                $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
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
        Schema::dropIfExists('document_links');
    }
}
