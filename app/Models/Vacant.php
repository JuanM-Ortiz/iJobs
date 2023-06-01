<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacant extends Model
{
    use HasFactory;

    protected $casts = ['lastDay' => 'date'];

    protected $fillable = [
        'title',
        'salary_id',
        'category_id',
        'company',
        'lastDay',
        'description',
        'image',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }

}
