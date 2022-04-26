<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // define which columns can be passed from the ::create([]) method of the store method in the controller
    protected $fillable = ['name', 'semester', 'credit_hours', 'department_id'];

    
    // A subject belongs to a department
    public function department() {
        return $this->belongsTo(Department::class);
    }
}
