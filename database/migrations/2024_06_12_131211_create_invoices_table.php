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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->date('invoice_date');
            $table->date('due_date');
            $table->string('product');
//            $table->string('section');
            $table->foreignId('section_id')->references('id')->on('sections')->cascadeOnDelete();
            $table->decimal('Amount_collection',8,2)->nullable();
            $table->decimal('Amount_Commission',8,2);
            $table->string('discount');
            $table->string('rate_vat');  //نسبة الضريبه
            $table->decimal('value_vate',8,2);  // قيمة الضريبه
            $table->decimal('total',8,2);
            $table->string('status', 50);
            $table->integer('value_status');  //1, 2, 3
            $table->text('note')->nullable();
            // $table->date('Payment_Date')->nullable();
            $table->string('user');
            $table->softDeletes();   //أرشفه
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
