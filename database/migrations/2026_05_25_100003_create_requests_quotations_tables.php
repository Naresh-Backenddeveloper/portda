<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->string('reference', 20)->unique();
            $table->foreignId('buyer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('port_id')->constrained()->restrictOnDelete();
            $table->foreignId('category_id')->constrained()->restrictOnDelete();
            $table->foreignId('subcategory_id')->nullable()->constrained()->nullOnDelete();
            $table->string('vessel_name');
            $table->string('imo_number', 32)->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('service_date')->nullable();
            $table->string('service_time', 16)->nullable();
            $table->decimal('budget_min', 14, 2)->nullable();
            $table->decimal('budget_max', 14, 2)->nullable();
            $table->string('currency', 4)->default('INR');
            $table->enum('urgency', ['standard', 'urgent', 'critical'])->default('standard');
            $table->enum('status', ['draft', 'open', 'quoted', 'awarded', 'in_progress', 'completed', 'cancelled'])->default('open')->index();
            $table->json('attachments')->nullable();
            $table->json('meta')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('reference', 20)->unique();
            $table->foreignId('service_request_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vendor_id')->constrained('users')->cascadeOnDelete();
            $table->decimal('amount', 14, 2);
            $table->string('currency', 4)->default('INR');
            $table->text('notes')->nullable();
            $table->json('line_items')->nullable();
            $table->date('valid_until')->nullable();
            $table->enum('status', ['submitted', 'shortlisted', 'accepted', 'rejected', 'withdrawn', 'expired'])->default('submitted')->index();
            $table->json('terms')->nullable();
            $table->boolean('is_negotiable')->default(true);
            $table->timestamp('accepted_at')->nullable();
            $table->timestamps();
            $table->unique(['service_request_id', 'vendor_id']);
        });

        Schema::create('quotation_revisions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_id')->constrained()->cascadeOnDelete();
            $table->foreignId('proposed_by')->constrained('users')->cascadeOnDelete();
            $table->decimal('amount', 14, 2);
            $table->text('notes')->nullable();
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotation_revisions');
        Schema::dropIfExists('quotations');
        Schema::dropIfExists('service_requests');
    }
};
