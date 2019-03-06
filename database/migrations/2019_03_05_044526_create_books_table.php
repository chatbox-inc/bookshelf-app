<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * 書籍テーブル
 *
 * Class CreateBooksTable
 */
class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment('書籍名');
            $table->text('url')->comment('URL(Amazon等)');
            $table->text('img')->comment('画像');
            $table->text('description')->comment('説明');
            $table->string('isbn')->comment('ISBN10/13');
            $table->string('author')->comment('著者');
            $table->string('publisher')->comment('出版社');
            $table->date('published_at')->comment('出版日');
            $table->boolean('is_rental')->default(false)->comment('レンタルされているか');
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
        Schema::dropIfExists('books');
    }
}
