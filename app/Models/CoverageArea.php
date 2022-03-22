<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoverageArea extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function relationInDistrict()
    {
        return $this->hasOne(District::class, 'id', 'district_id');
    }

   
    function relationInCostArea(){
        return $this->hasMany(AreaCost::class, 'area_name');
    }
  



}
