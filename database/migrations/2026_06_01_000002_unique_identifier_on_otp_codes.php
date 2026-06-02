<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * One active OTP row per identifier. A new request overwrites the prior code
 * via updateOrCreate(['identifier' => ...], [...]) in AuthController::requestOtp.
 */
return new class extends Migration
{
    public function up(): void
    {
        // Collapse any historical duplicates: keep only the most recent row per identifier.
        DB::statement('
            DELETE o1 FROM otp_codes o1
            INNER JOIN otp_codes o2
              ON o1.identifier = o2.identifier
             AND o1.id < o2.id
        ');

        Schema::table('otp_codes', function (Blueprint $table) {
            // The original migration created an index on `identifier`. Drop it
            // so we can replace it with a UNIQUE constraint.
            $table->dropIndex(['identifier']);
            $table->unique('identifier');
        });
    }

    public function down(): void
    {
        Schema::table('otp_codes', function (Blueprint $table) {
            $table->dropUnique(['identifier']);
            $table->index('identifier');
        });
    }
};
