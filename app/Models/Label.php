<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Searchable;

class Label extends Model
{
    use HasFactory;
    use Sortable;
    use Searchable;

    protected $sortable = [
      'receiver_name'
    ];

    protected $fillable = [
        'receiver_name',
        'street',
        'city',
        'state',
        'zip',
        'package_id'
    ];

    public function package(){
        return $this->hasOne(Package::class);
    }


    #[SearchUsingFullText(['receiver_name', 'street', 'city', 'state', 'zip'], [])]
    public function toSearchableArray()
    {
        return [
            'receiver_name' => $this->receiver_name,
            'street' => $this->street,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
        ];
    }


}
