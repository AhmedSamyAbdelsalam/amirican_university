<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Center extends Model
{
    use HasFactory,SearchableTrait;

    protected $guarded = [];

    protected $searchable = [
        'columns'   => [
            'centers.region'     => 10,
            'centers.country'    => 10,
            'centers.state'      => 10,
            'centers.name'       => 10,
            'centers.logo'       => 10,
            'centers.email'      => 10,
            'centers.address'    => 10,
        ],
    ];
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function status()
    {
        return $this->status == 1 ? 'Active' : 'Inactive';
    }

}
