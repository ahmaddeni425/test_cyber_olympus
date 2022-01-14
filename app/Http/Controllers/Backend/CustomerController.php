<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use Validator;
use Hash;

class CustomerController extends Controller
{
    public function index(){
        $customers_count = User::when(request()->phone, function($customers){
            $customers = $customers->where('phone', 'like', '%'.request()->phone.'%');
        })->when(request()->address, function($customers){
            $customers = $customers->whereHas('customer', function($customers){
                return $customers->where('address', 'like', '%'.request()->address.'%');
            });
        })->when(request()->created_at_since, function($customers){
            $customers = $customers->where('created_at', '>=', date('Y-m-d 00:00:00', strtotime(request()->created_at_since)));
        })->when(request()->created_at_until, function($customers){
            $customers = $customers->where('created_at', '<=', date('Y-m-d 23:59:59', strtotime(request()->created_at_until)));
        })->when(request()->first_name, function($customers){
            $customers = $customers->where('first_name', 'like', '%'.request()->first_name.'%');
        })->when(request()->last_name, function($customers){
            $customers = $customers->where('last_name', 'like', '%'.request()->last_name.'%');
        })
        ->count();
        $customers = User::when(request()->phone, function($customers){
            $customers = $customers->where('phone', 'like', '%'.request()->phone.'%');
        })->when(request()->address, function($customers){
            $customers = $customers->whereHas('customer', function($customers){
                return $customers->where('address', 'like', '%'.request()->address.'%');
            });
        })->when(request()->created_at_since, function($customers){
            $customers = $customers->where('created_at', '>=', date('Y-m-d 00:00:00', strtotime(request()->created_at_since)));
        })->when(request()->created_at_until, function($customers){
            $customers = $customers->where('created_at', '<=', date('Y-m-d 23:59:59', strtotime(request()->created_at_until)));
        })->when(request()->first_name, function($customers){
            $customers = $customers->where('first_name', 'like', '%'.request()->first_name.'%');
        })->when(request()->last_name, function($customers){
            $customers = $customers->where('last_name', 'like', '%'.request()->last_name.'%');
        })
        ->orderBy('first_name','asc')->paginate(10);
        return view('backend.customers.index', compact('customers', 'customers_count'));
    }

    public function create(){
        return view('backend.customers.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|unique:users',
            'address' => 'required|max:255',
            'password' => 'required|confirmed|min:8'
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        if($user){
            $customer = new Customer();
            $customer->id = $user->id;
            $customer->address = $request->address;
            $customer->save();
        }

        return redirect()->route('backend.customers.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id){
        $customer = User::findOrFail($id);
        return view('backend.customers.edit', compact('customer'));
    }

    public function detail($id){
        $customer = User::findOrFail($id);
        return view('backend.customers.detail', compact('customer'));
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required|numeric|unique:users,phone,'.$user->id,
            'address' => 'required|max:255',
            'password' => 'nullable|confirmed|min:8'
        ]);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        if($user){
            $customer = Customer::findOrFail($user->id);
            $customer->id = $user->id;
            $customer->address = $request->address;
            $customer->save();
        }

        return redirect()->route('backend.customers.index')->with('success', 'Data Berhasil Diupdate');
    }

    public function destroy($id){
        $customer = Customer::findOrFail($id);
        $customer->delete();
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('backend.customers.index')->with('success', 'Data Berhasil Dihapus');
    }
}
