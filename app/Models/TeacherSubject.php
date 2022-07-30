<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSubject extends Model
{
    use HasFactory;

    protected $fillable = ['subject_id', 'batch_id', 'teacher_id', 'year', 'semester'];

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function batch() {
        return $this->belongsTo(Batch::class);
    }
    

    /**
     * The "booted" method of the model.
     * This will execute when a new subject is created
     * this will create subject marks entries
     * 
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($teachersubject) {
            // get all students with the teachersubject department
            $students = Student::where('batch_id', '=', $teachersubject->batch_id)->get();
            // iterate over all students and create the subjectmark entry
            foreach ($students as $student) {
                SubjectMark::create([
                    'student_id' => $student->id,
                    'subject_id' => $teachersubject->subject_id,
                    'teacher_id' => $teachersubject->teacher_id,
                    'mid_marks' => null,
                    'sessional_marks' => null,
                    'practical_marks' => null,
                    'final_marks' => null,
                    'locked' => false,
                ]);
                error_log('creating subjectsmarks...');
            }
        });
    }
}
