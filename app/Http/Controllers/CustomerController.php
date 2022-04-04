<?php

namespace App\Http\Controllers;

use App\Models\User;

class CustomerController extends Controller
{


    public function index(){
        $customers = User::
            sortable()
            ->where(
                ['is_admin' => 0,
                'is_administrative' => 0,
                'is_packer' => 0]
            )
            ->paginate(10);
        return view('panel.customers.index')
            ->with('customers', $customers);
    }
}
