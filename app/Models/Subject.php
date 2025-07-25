<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    // app/Models/Subject.php

    protected $fillable = ['name', 'major_id'];


   public function major()
{
    return $this->belongsTo(Major::class);
}

}
