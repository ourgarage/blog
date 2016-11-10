<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Ourgarage\Blog\Models\Post;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('status')->default(Post::STATUS_ACTIVE)->index();
            $table->string('title')->unique();
            $table->string('slug')->unique()->index();
            $table->text('content');
            $table->string('meta_keywords');
            $table->string('meta_description');
            $table->string('meta_title');
            $table->datetime('published_at')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
