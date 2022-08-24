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
    Schema::create('post_tag', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('post_id')->unsigned()->index();
      $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
      $table->bigInteger('tag_id')->unsigned()->index();
      $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::table('post_tag', function (Blueprint $table) {
      $table->dropForeign(['post_id']);
      $table->dropForeign(['tag_id']);
    });
    Schema::dropIfExists('post_tag');
  }
};