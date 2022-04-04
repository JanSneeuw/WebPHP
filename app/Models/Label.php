<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Label extends Model
{
    use HasFactory;
    use Sortable;

    protected $sortable = [
      'receiver_name'
    ];

    protected $fillable = [
        'receiver_name',
        'address_id',
        'package_id'
    ];

    public function package(){
        return $this->hasOne(Package::class);
    }

    public function address(){
        return $this->belongsTo(Address::class);
    }
}
