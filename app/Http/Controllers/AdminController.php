<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Room;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addRoom()
    {
        $types = ['Whitesand', 'Coconut', 'Ocean', 'Wave',];

        return view('admin.create-form', ['types' => $types]);
    }

    public function editRoom($roomNo)
    {
        $room = Room::where('room_no', $roomNo)->firstOrFail();

        $id = $room->customer_id;

        $name = '';
        $phone = '';

        if ($id !== null) {
            $customer = Customer::where('customer_id', $id)->firstOrFail();
            $name = $customer->name;
            $phone = $customer->phone;
        }

        return view('admin.edit-form', [
            'room_no' => $roomNo, 'id' => $id, 'name' => $name, 'phone' => $phone
        ]);
    }

    public function updateCustomer(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $phone = $request->input('phone');


        if ($id === null) {
            $customer = new Customer();
        } else {
            $customer = Customer::where('customer_id', $id)->first();

            if ($customer === null) {
                return back()->with('error', 'Customer tidak ditemukan');
            }
        }

        $customer->name = $name;
        $customer->phone = $phone;
        $customer->save();

        return redirect('/admin')->with('success', 'Update berhasil');
    }
}
