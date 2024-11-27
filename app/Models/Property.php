<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';

    public $primaryKey='id';

    public $timestamps=true;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function booking(){
        return $this->hasMany(Booking::class);
    }


}
