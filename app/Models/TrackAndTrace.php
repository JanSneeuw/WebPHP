<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackAndTrace extends Model
{
    use HasFactory, Uuids;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function package()
    {
        return $this->belongsTo('App\Models\Package');
    }

    public function feedback(){
        return $this->hasOne('App\Models\Feedback');
    }
}
