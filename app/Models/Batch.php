<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    // define which columns can be passed from the ::create([]) method of the store method in the controller
    protected $fillable = ['name'];

    public function students() {
        return $this->hasMany(Batch::class);
    }
}
