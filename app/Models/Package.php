<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Package extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = [
        'name',
        'provider',
        'receiver_name',
        'weight',
        'measurements',
        'status',
        'carrier_id',
        'address_id'
    ];

    protected $fillable = [
        'name','provider','receiver_name','weight','measurements','status', 'carrier_id', 'address_id'
    ];

    public function carrier(){
        return $this->hasOne(Carrier::class, 'id', 'carrier_id');
    }

    public function address(){
        return $this->hasOne(Address::class, 'id', 'address_id');
    }

    public function label(){
        return $this->belongsTo(Label::class);
    }

    public function pickUp(){
        return $this->belongsTo(PickUp::class);
    }
}
