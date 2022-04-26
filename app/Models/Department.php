<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    // define which columns can be passed from the ::create([]) method of the store method in the controller
    protected $fillable = ['name'];

    
    public function subjects() {
        return $this->hasMany(Department::class);
    }

    public function teachers() {
        return $this->hasMany(Department::class);
    }
}
