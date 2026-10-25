<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Grade;

class GradeHistory extends Model
{
    protected $fillable = [
        'grade_id',
        'old_value',
        'new_value',
        'modified_by',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function modifier()
    {
        return $this->belongsTo(User::class, 'modified_by');
    }
}
