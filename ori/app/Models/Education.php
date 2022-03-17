<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = [
        'category_id',
        'teacher_id',
        'education_name',
        'description',
        'date',
        'starttime',
        'endtime',
        'amount',
        'people',
        'created_at'
    ];

    public static function select(string $string, string $string1)
    {
    }


    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

}

