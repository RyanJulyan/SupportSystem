<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->uuid('ticket_guid', 36);
            $table->string('subject', 250);
            $table->mediumText('description');
            $table->dateTime('due_date', 0);
            $table->string('formatted_address', 250);
            $table->unsignedBigInteger('assigned_user_id')->nullable();
                $table->foreign('assigned_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('ticket_category_id');
                $table->foreign('ticket_category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('tickets');
    }
}
