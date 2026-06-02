<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('buyer_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('company_name');
            $table->string('imo_number', 32)->nullable();
            $table->string('gst_number', 32)->nullable();
            $table->string('billing_address')->nullable();
            $table->string('city', 64)->nullable();
            $table->string('state', 64)->nullable();
            $table->string('country', 64)->default('India');
            $table->string('postal_code', 16)->nullable();
            $table->foreignId('default_port_id')->nullable()->constrained('ports')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('vendor_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('company_name');
            $table->text('bio')->nullable();
            $table->string('gst_number', 32)->nullable();
            $table->string('pan_number', 16)->nullable();
            $table->string('city', 64)->nullable();
            $table->string('state', 64)->nullable();
            $table->string('country', 64)->default('India');
            $table->decimal('rating', 3, 2)->default(0);
            $table->unsignedInteger('rating_count')->default(0);
            $table->unsignedInteger('jobs_completed')->default(0);
            $table->enum('verification_status', ['unverified', 'pending', 'verified', 'rejected'])->default('unverified')->index();
            $table->boolean('is_premium')->default(false);
            $table->json('bank_account')->nullable();
            $table->timestamps();
        });

        Schema::create('vendor_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_profile_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subcategory_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
            $table->unique(['vendor_profile_id', 'category_id', 'subcategory_id'], 'vendor_cat_sub_unique');
        });

        Schema::create('vendor_ports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_profile_id')->constrained()->cascadeOnDelete();
            $table->foreignId('port_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['vendor_profile_id', 'port_id']);
        });

        Schema::create('kyc_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('doc_type', ['gst', 'pan', 'cin', 'iec', 'dgs_license', 'pi_insurance', 'address_proof', 'bank_proof', 'other'])->index();
            $table->string('doc_number', 64)->nullable();
            $table->string('file_path');
            $table->string('original_name')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending')->index();
            $table->text('reject_reason')->nullable();
            $table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kyc_documents');
        Schema::dropIfExists('vendor_ports');
        Schema::dropIfExists('vendor_categories');
        Schema::dropIfExists('vendor_profiles');
        Schema::dropIfExists('buyer_profiles');
    }
};
