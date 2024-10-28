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
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->integer('entry_no');
            $table->timestamp('timestamp')->nullable();
            $table->text('category')->nullable();
            $table->text('subcategory')->nullable();
            $table->text('membership')->nullable();
            $table->text('entry_title')->nullable();
            $table->text('implementation_period')->nullable();
            $table->text('company_organization')->nullable();
            $table->text('company_agency')->nullable();
            $table->text('agency')->nullable();
            $table->text('contact_person')->nullable();
            $table->text('position')->nullable();
            $table->text('email')->nullable();
            $table->text('phone_number')->nullable();
            $table->longText('summary')->nullable();
            $table->longText('objectives')->nullable();
            $table->longText('target_audience')->nullable();
            $table->longText('execution_details')->nullable();
            $table->longText('results')->nullable();
            $table->longText('is_uploadpr')->nullable();
            $table->longText('is_uploadkv')->nullable();
            $table->longText('is_uploadloa')->nullable();
            $table->text('other_doc')->nullable();
            $table->text('payment_status')->nullable();
            $table->text('proof_payment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};
