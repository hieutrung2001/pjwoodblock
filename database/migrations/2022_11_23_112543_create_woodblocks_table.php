<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('woodblocks', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->increments('id');
            $table->string('engraved_face', 255)->nullable(true);
            $table->string('quyen')->nullable(true);
            $table->string('code', 11)->nullable(true);
            $table->text('description')->nullable(true);
            $table->text('link', 255)->nullable(true);
            $table->string('front_image', 255)->nullable(true);
            $table->string('back_image', 255)->nullable(true);
            $table->smallInteger('state')->nullable(false)->default(1);
            $table->unsignedBigInteger('created')->nullable(false);
            $table->unsignedBigInteger('modified')->nullable(true);

            $table->unsignedInteger('books_id');
            $table->unsignedInteger('dynasty_id');
            $table->foreign('books_id')->references('id')->on('books')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->foreign('dynasty_id')->references('id')->on('dynasty')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('woodblocks');
    }
};
