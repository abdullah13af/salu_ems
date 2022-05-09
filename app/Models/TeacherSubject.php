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
    
}
