<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Phone-only OTP signup creates users without an email address.
 * Email stays unique (MySQL allows multiple NULLs in a unique index).
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->nullable()->change();
        });
    }

    public function down(): void
    {
        // Backfill any nulls first so the constraint can be re-applied.
        \DB::table('users')->whereNull('email')->update([
            'email' => \DB::raw("CONCAT('user-', id, '@no-email.portda.local')"),
        ]);
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->nullable(false)->change();
        });
    }
};
