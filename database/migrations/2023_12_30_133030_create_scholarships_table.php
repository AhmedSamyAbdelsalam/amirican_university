<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('country');
            $table->string('phone')->unique();
            $table->string('address');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('specialization');
            $table->string('subject');
            $table->text('message');
            $table->string('qualifications');
            $table->string('national_id');
            $table->string('passport_copy');
            $table->string('cv');
            $table->string('other_document');
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
        Schema::dropIfExists('scholarships');
    }
}
