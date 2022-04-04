<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class PickUp extends Model
{
    use HasFactory;
    use Sortable;

    protected $sortable = [
        'planned_pickup_date',
    ];

    protected $fillable = [
        'depot_id',
        'picked_up',
        'planned_pickup_date',
        'package_id'
    ];

    public function packages(){
        return $this->hasMany(Package::class);
    }

    public function depot(){
        return $this->belongsTo(Depot::class);
    }
}
