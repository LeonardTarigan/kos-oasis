<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = [
            ['sender' => 'Budi Santoso', 'rating' => 4.5, 'image' => 'https://cdn.idntimes.com/content-images/duniaku/post/20220604/megumi-4bc64cfb9ac87ae3c7e9f74e811f02e1.jpeg', 'message' => 'Tempat kos ini sangat nyaman dan bersih. Kamar dilengkapi dengan fasilitas lengkap seperti AC, kamar mandi dalam, dan lemari. Pemilik kos sangat ramah dan responsif terhadap kebutuhan penghuni. Lokasinya juga strategis, dekat dengan pusat perbelanjaan dan transportasi umum'],
            ['sender' => 'Ahmad Hidayat', 'rating' => 4.7, 'image' => 'https://www.dmarge.com/wp-content/uploads/2021/01/dwayne-the-rock-.jpg', 'message' => 'Saya sangat puas tinggal di kos ini. Lingkungannya tenang dan aman, sehingga membuat saya merasa nyaman dan bisa fokus pada belajar. Ruangan kos juga terawat dengan baik dan fasilitasnya lengkap. Pemilik kos sangat perhatian dan selalu siap membantu jika ada masalah.'],
            ['sender' => 'Adi Nugroho', 'rating' => 4.2, 'image' => 'https://berita.99.co/wp-content/uploads/2021/02/Sabun-Cuci-Muka-Pria.jpg', 'message' => 'Tempat kos ini memiliki suasana yang ramah dan hangat. Pemilik kos sangat perhatian dan menjaga kebersihan dengan baik. Kamar-kamar di kos ini cukup luas dan dilengkapi dengan tempat tidur, meja belajar, dan kamar mandi pribadi.'],
        ];

        $types = ['Whitesand', 'Coconut', 'Ocean', 'Wave'];
        $rooms = Room::whereIn('type', $types)
            ->where(function ($query) {
                $query->whereRaw('rooms.room_no = (SELECT MIN(room_no) FROM rooms AS r WHERE r.type = rooms.type)');
            })
            ->get();



        return view('home', ['reviews' => $reviews, 'rooms' => $rooms]);
    }
}
