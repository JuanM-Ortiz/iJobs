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
        Schema::table('vacants', function (Blueprint $table) {
            $table->string('title');
            $table->foreignId('salary_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('company');
            $table->date('lastDay');
            $table->text('description');
            $table->string('image');
            $table->integer('published')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacants', function (Blueprint $table) {
            $table->dropForeign('vacants_user_id_foreign');
            $table->dropForeign('vacants_salary_id_foreign');
            $table->dropForeign('vacants_category_id_foreign');

            $table->dropColumn([
                'title',
                'salary_id',
                'category_id',
                'company',
                'lastDay',
                'description',
                'image', 
                'published',
                'user_id'
            ]);
        });
    }
};
