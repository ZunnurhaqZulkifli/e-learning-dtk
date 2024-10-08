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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('teacher_id')->nullable()->constrained('teachers')->onDelete('cascade');
            $table->unsignedBigInteger('course_id')->nullable()->constrained('courses')->onDelete('cascade');
            
            $table->string('name');
            $table->string('code');
            $table->string('video_path')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });

        Schema::create('assignments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('subject_id')->constrained('subjects')->onDelete('cascade');

            $table->integer('target_mark')->default(0);
            $table->string('name');
            $table->string('code');
            $table->string('description')->nullable();        
            $table->string('status')->default('active');
        
            $table->timestamps();
        });

        Schema::create('assignment_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('assignment_id')->nullable()->constrained('assignments')->onDelete('cascade');
            $table->unsignedBigInteger('teacher_id')->nullable()->constrained('teachers')->onDelete('cascade');

            $table->string('name');
            $table->string('code');
            $table->string('description')->nullable();
            
            $table->integer('marks')->default(0);

            $table->boolean('is_completed')->default(false);
            $table->date('start_date')->nullable();
            $table->date('submitted_at')->nullable();
            $table->string('status')->default('active');
            $table->string('file');
            $table->boolean('is_graded')->default(false);
            
            $table->timestamps();
        });

        Schema::create('assignment_detail_student', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('assignment_detail_id')->constrained('assignment_details')->onDelete('cascade');
            $table->unsignedBigInteger('student_id')->constrained('students')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment_detail_student');
        Schema::dropIfExists('assignment_details');
        Schema::dropIfExists('assignments');
        Schema::dropIfExists('subjects');
    }
};
