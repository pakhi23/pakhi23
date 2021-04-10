<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class finder extends Model
{
    use HasFactory;
    protected $table = "finder";
    protected $fillable =['name', 'number','email','address', 'bloodgroup',  'country', 'state', 'city','created_by'];

    public function countryname()
    {
        return $this->belongsTo(countries::class,'country','id');
    }
    public function cityname()
    {
        return $this->belongsTo(cities::class,'city','id');
    }
}

