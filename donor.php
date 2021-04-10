<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donor extends Model
{
    use HasFactory;
    protected $table = "donor";
    protected $fillable = ['name', 'number', 'birthDate', 'weight', 'age', 'email', 'bloodgroup', 'gender', 'currentaddress', 'permanentaddress', 'country', 'state', 'city','covid', 'willingtodonateplasma', 'whichtypedoner','created_by'];


    public function countryname()
    {
        return $this->belongsTo(countries::class,'country','id');
    }
    public function cityname()
    {
        return $this->belongsTo(cities::class,'city','id');
    }
}
