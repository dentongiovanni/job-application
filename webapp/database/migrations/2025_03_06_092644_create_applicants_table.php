<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->string('province');
            $table->string('city');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->enum('sex', ['Male', 'Female', 'Other']);
            $table->integer('age');
            $table->string('marital_status');
            $table->string('course')->nullable();
            $table->string('position_applied');
            $table->timestamps();
        });

        $filePath = storage_path('app/private/applicants.xlsx');
        if (file_exists($filePath)) {
            (new \App\Services\ExcelImportService)->importApplicants($filePath);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }

};
