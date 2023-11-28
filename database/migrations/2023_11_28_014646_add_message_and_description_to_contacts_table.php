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
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('email_verified_at');

            $table->string('message')->nullable()->after('phone');
            $table->string('description')->nullable()->after('message');
            $table->integer('read_by')->nullable()->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->timestamp('email_verified_at')->nullable();

            $table->dropColumn('message');
            $table->dropColumn('description');
            $table->dropColumn('read_by');
        });
    }
};
