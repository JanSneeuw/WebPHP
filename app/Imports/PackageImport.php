<?php

namespace App\Imports;

use App\Models\Address;
use App\Models\Carrier;
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
        $package = new Package([
            'name' => $row[0],
            'provider' => $row[1],
            'receiver_name'=> $row[2],
            'weight' => $row[3],
            'measurements' => $row[4],
            'status' => $row[5],
        ]);

        $address = new Address;
        $address->street = $row[6];
        $address->city = $row[7];
        $address->state = $row[8];
        $address->zip = $row[9];
        $address->save();
        $package->address_id = $address->id;


        $carrier = new Carrier;
        $carrier->name = $row[10];
        $carrier->save();
        $package->carrier_id = $carrier->id;

        return $package;
    }
}
