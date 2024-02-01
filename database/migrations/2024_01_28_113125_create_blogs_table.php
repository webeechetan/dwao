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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('sub_category_id')->constrained('sub_categories')->onDelete('cascade');
            $table->mediumText('title');
            $table->longText('description');
            $table->mediumText('short_description')->nullable();
            $table->mediumText('slug')->unique();
            $table->mediumText('thumbnail')->default('default.jpg');
            $table->mediumText('banner')->default('default.jpg');
            $table->mediumText('featured_thumbnail_image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('meta_title')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->mediumText('og_title')->nullable();
            $table->mediumText('og_image')->nullable();
            $table->boolean('is_published')->default(true);
            $table->integer('type')->default(1)->comment('1: Blog, 2: News, 3: Work');
            $table->date('publish_date')->default(date('Y-m-d'));
            $table->longText('trending_insights_title')->nullable();
            $table->longText('trending_insights_url')->nullable();
            $table->longText('minutes')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
