<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
            'email' ,
            'gender', 
            'department' ,
            'position' ,
            'phone' ,
            'address',
            'dob',
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'emp_id'); // Assuming 'emp_id' is the foreign key
}
}
