<?php

namespace App\Rules;

use App\Models\TeacherSubject;
use Illuminate\Contracts\Validation\Rule;

class UniqueTeacherSubjectBatch implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $teacher_id;
    protected $subject_id;
    protected $batch_id;
    protected $update_id;
    public function __construct($teacher_id, $subject_id, $batch_id, $update_id)
    {
        $this->teacher_id = $teacher_id;
        $this->subject_id = $subject_id;
        $this->batch_id = $batch_id;
        $this->update_id = $update_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($this->update_id == null){
            if(TeacherSubject::where([['teacher_id', '=', $this->teacher_id], 
                                    ['subject_id', '=', $this->subject_id],
                                    ['batch_id', '=', $this->batch_id]])->exists())
            return false;
        }
        else{
            if(TeacherSubject::where([['teacher_id', '=', $this->teacher_id], 
                                    ['subject_id', '=', $this->subject_id],
                                    ['batch_id', '=', $this->batch_id],
                                    ['id', '!=', $this->update_id]
                                    ])->exists())
                return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The selected Subject of selected Batch is already assigned to another Teacher.';
    }
}
