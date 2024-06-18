<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_name')->nullable();
            $table->text('description')->nullable();
            $table->string('created_by', 999)->nullable();
            $table->timestamps();
        });

        DB::table('sections')->delete();
        DB::table('sections')->insert([
            'section_name' => 'بنك ابوظبى',
        ],);


        DB::table('sections')->insert([
            'section_name' => 'البنك الأهلى المصرى',
        ],);



        DB::table('sections')->insert([
            'section_name' => 'البنك الأهلى الكويتى',
        ],);


        DB::table('sections')->insert([
            'section_name' => 'بنك مصر',
        ],);


        DB::table('sections')->insert([
            'section_name' => 'بنك القاهرة',
        ],);


        DB::table('sections')->insert([
            'section_name' => 'بنك CIB',
        ],);

        DB::table('sections')->insert([
            'section_name' => 'بنك QNB',
        ],);



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
