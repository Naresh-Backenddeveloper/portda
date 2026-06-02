<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('reference', 20)->unique();
            $table->foreignId('service_request_id')->constrained()->restrictOnDelete();
            $table->foreignId('quotation_id')->constrained()->restrictOnDelete();
            $table->foreignId('buyer_id')->constrained('users')->restrictOnDelete();
            $table->foreignId('vendor_id')->constrained('users')->restrictOnDelete();
            $table->decimal('subtotal', 14, 2);
            $table->decimal('tax', 14, 2)->default(0);
            $table->decimal('commission', 14, 2)->default(0);
            $table->decimal('total', 14, 2);
            $table->string('currency', 4)->default('INR');
            $table->enum('status', ['placed', 'confirmed', 'in_progress', 'completed', 'cancelled', 'disputed'])->default('placed')->index();
            $table->enum('payment_status', ['pending', 'partially_paid', 'paid', 'refunded', 'failed'])->default('pending')->index();
            $table->timestamp('scheduled_at')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->text('cancel_reason')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
        });

        Schema::create('order_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('actor_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('event', 64);
            $table->text('message')->nullable();
            $table->json('payload')->nullable();
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('reference', 24)->unique();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('payer_id')->constrained('users')->restrictOnDelete();
            $table->decimal('amount', 14, 2);
            $table->string('currency', 4)->default('INR');
            $table->enum('method', ['upi', 'card', 'netbanking', 'razorpay', 'neft', 'rtgs', 'wallet', 'cash'])->index();
            $table->enum('type', ['online', 'offline'])->default('online');
            $table->enum('status', ['initiated', 'pending', 'processing', 'success', 'failed', 'refunded', 'cancelled'])->default('initiated')->index();
            $table->string('gateway_txn_id')->nullable();
            $table->string('utr_number', 32)->nullable();
            $table->string('proof_path')->nullable();
            $table->json('gateway_response')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
        });

        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('number', 32)->unique();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('buyer_id')->constrained('users')->restrictOnDelete();
            $table->foreignId('vendor_id')->constrained('users')->restrictOnDelete();
            $table->decimal('subtotal', 14, 2);
            $table->decimal('tax', 14, 2)->default(0);
            $table->decimal('total', 14, 2);
            $table->string('currency', 4)->default('INR');
            $table->enum('status', ['draft', 'issued', 'paid', 'overdue', 'cancelled'])->default('issued');
            $table->date('issued_at');
            $table->date('due_at')->nullable();
            $table->json('line_items')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
        });

        Schema::create('payouts', function (Blueprint $table) {
            $table->id();
            $table->string('reference', 24)->unique();
            $table->foreignId('vendor_id')->constrained('users')->restrictOnDelete();
            $table->foreignId('order_id')->nullable()->constrained()->nullOnDelete();
            $table->decimal('amount', 14, 2);
            $table->decimal('commission', 14, 2)->default(0);
            $table->decimal('net_amount', 14, 2);
            $table->string('currency', 4)->default('INR');
            $table->enum('status', ['pending', 'processing', 'paid', 'failed', 'on_hold'])->default('pending')->index();
            $table->string('utr_number', 32)->nullable();
            $table->json('bank_account')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payouts');
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('order_events');
        Schema::dropIfExists('orders');
    }
};
