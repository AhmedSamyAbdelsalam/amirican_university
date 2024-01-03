<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Scholarship extends Model
{
    use HasFactory,SearchableTrait;

    protected $guarded = [];
    protected $searchable = [
        'columns'   => [
            'scholarships.name'            => 10,
            'scholarships.email'           => 10,
            'scholarships.country'         => 10,
            'scholarships.phone'           => 10,
            'scholarships.address'         => 10,
            'scholarships.specialization'  => 10,
            'scholarships.subject'         => 10,
            'scholarships.message'         => 10,
        ],
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
