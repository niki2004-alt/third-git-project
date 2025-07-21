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
        Schema::create('sts', function (Blueprint $table) {
             $table->id(); // Auto-increment ID

            $table->string('number')->unique(); // Student registration number
            $table->string('name');             // Full name
            $table->string('year');             // Academic year or grade
            $table->string('gender');           // e.g., Male, Female, Other

            $table->unsignedBigInteger('major_id'); // Foreign key to majors

            $table->foreign('major_id')
                  ->references('id')->on('majors')
                  ->onDelete('cascade');

            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sts');
    }
};
