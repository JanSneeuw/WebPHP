<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{


    public function index(Request $request){
        $filter = $request->query('filter');
        if (!empty($filter)){
            $customers = User::
            sortable()
                ->where(
                    ['is_admin' => 0,
                        'is_administrative' => 0,
                        'is_packer' => 0,])
                ->where('name', 'like', '%' . $filter . '%')
                ->paginate(10);
        }else{
            $customers = User::
            sortable()
                ->where(
                    ['is_admin' => 0,
                        'is_administrative' => 0,
                        'is_packer' => 0]
                )
                ->paginate(10);
        }
        return view('panel.customers.index')
            ->with('customers', $customers)
            ->with('filter', $filter);
    }
}
