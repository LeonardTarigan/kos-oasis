<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function show($type)
    {
        $room = Room::where('type', $type)->firstOrFail();
        $message =
            'Halo, saya ingin memesan kamar Tipe ' . $room['type'] . '. Apakah masih tersedia?';

        $remaining = Room::where('type', $type)
            ->whereNull('customer_id')
            ->count();

        return view('room-detail', ['room' => $room, 'remaining' => $remaining, 'message' => $message]);
    }

    public function showTable()
    {
        $rooms = Room::leftJoin('customers', 'rooms.customer_id', '=', 'customers.customer_id')
            ->select('rooms.*', 'customers.name', 'customers.phone')
            ->get();


        return view('admin.dashboard', ['rooms' => $rooms,]);
    }

    public function delete($roomNo)
    {
        $room = Room::where('room_no', $roomNo);

        if ($room) {
            // Delete the room
            $room->delete();
            $message = "Kamar " . $roomNo . " berhasil dihapus";

            return redirect('/admin')->with('success', $message);
        } else {
            $message = "Kamar " . $roomNo . " berhasil ditemukan";

            return redirect('/admin')->with('error', $message);
        }
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'room-no' => 'required|numeric',
            'image-link' => 'required|url',
            'price' => 'required|numeric',
            'type' => 'required',
            'desc' => 'required',
        ]);


        $room = new Room();
        $room->room_no = $validatedData['room-no'];
        $room->image = $validatedData['image-link'];
        $room->price = $validatedData['price'];
        $room->type = $validatedData['type'];
        $room->description = $validatedData['desc'];

        $room->save();

        $message = "Kamar " . $validatedData['room-no'] . " berhasil dibuat";


        session()->flash('success', $message);

        return redirect('/admin');
    }
}
