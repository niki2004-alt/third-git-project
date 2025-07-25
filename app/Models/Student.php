<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Specify the table name explicitly
    // Remove this line entirely OR explicitly set:
protected $table = 'students';


    protected $fillable = [
        'number',
        'name',
        'year',
        'gender',
        'major_id',
    ];

    // A student belongs to a major
    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
