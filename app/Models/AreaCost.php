<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaCost extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function relationWithCoverageArea()
    {
        return $this->hasOne(CoverageArea::class, 'id', 'area_name');
    }



}
