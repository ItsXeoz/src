<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->enum('type', ['Dropdown', 'Checkbox', 'Radio', 'Textbox', 'Scale Table']);
            $table->enum('category', ['Universal', 'Bekerja', 'Wiraswasta', 'Melanjutkan Pendidikan', 'Tidak Bekerja', 'Mencari Pekerjaan']);
            $table->integer('scale_min')->nullable();
            $table->integer('scale_max')->nullable();
            $table->json('choices')->nullable();
            $table->json('scale_questions')->nullable();
            $table->unsignedBigInteger('parent_question_id')->nullable();
            $table->timestamps();

            $table->foreign('parent_question_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
