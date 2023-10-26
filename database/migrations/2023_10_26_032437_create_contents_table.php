<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('body')->nullable();
            $table->string('type')->nullable(); // article, resource, update
            $table->boolean('status')->default(1)->nullable();
            $table->boolean('comment_status')->default(1)->nullable();
            $table->integer('views')->default(0)->nullable();

            $table->integer('parent_id')->nullable();
            $table->string('language')->default(null)->nullable(); // ID, EN

            // add field meta
            $table->text('meta_title')->nullable(); // meta title
            $table->text('meta_description')->nullable(); // meta description
            $table->text('meta_keywords')->nullable(); // meta keywords

            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->string('created_by_ip')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->string('updated_by_ip')->nullable();
            $table->timestamp('featured_at')->nullable();
            $table->integer('featured_by')->nullable();
            $table->string('featured_by_ip')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->integer('published_by')->nullable();
            $table->string('published_by_ip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
