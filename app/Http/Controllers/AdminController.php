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

    public function updateCustomer(Request $request, $roomNo)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $submitButton = $request->input('submit');

        if ($submitButton === 'remove') {
            $room = Room::where('room_no', $roomNo)->first();
            $room->customer_id = null;
            $room->save();

            return redirect('/admin')->with('success', 'Ruangan berhasil dikosongkan');
        }

        if ($id === null) {
            $customer = new Customer();
        } else {
            $customer = Customer::where('customer_id', $id)->first();

            if ($customer === null) {
                return back()->with('error', 'Customer not found');
            }
        }

        $customer->name = $name;
        $customer->phone = $phone;
        $customer->save();

        $room = Room::where('room_no', $roomNo)->first();
        if ($room->customer_id === null) {
            $room->customer_id = $customer->customer_id;
            $room->save();
        }

        return redirect('/admin')->with('success', 'Update berhasil');
    }
}
