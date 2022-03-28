<?php

namespace App\Imports;

use App\Models\Package;
use Maatwebsite\Excel\Concerns\ToModel;

class PackageImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Package([
            'name' => $row[0],
            'provider' => $row[1],
            'receiver_address' => $row[2],
            'receiver_name'=> $row[3],
            'weight' => $row[4],
            'measurements' => $row[5],
            'status' => $row[6],
        ]);
    }
}
