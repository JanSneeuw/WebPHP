<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Searchable;

class Address extends Model
{
    use HasFactory, Searchable;

    protected $guarded = ['id'];

    protected $fillable = [
        'street',
        'city',
        'state',
        'zip',
    ];

    public function packages(){
        return $this->belongsTo(Package::class);
    }
    #[SearchUsingFullText(['street', 'city', 'state', 'zip'], [])]
    public function toSearchableArray()
    {
        return [
            'street' => $this->street,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
        ];
    }
}
