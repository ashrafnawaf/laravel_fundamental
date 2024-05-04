<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AmandemyCafeController extends Controller
{
    public function index(){
        $menu = [
            ['nama' => 'Espresso',
             'harga' => 'Rp. 19.000', 
             'deskripsi' => 'Espresso merupakan kopi yang dihasilkan dari proses penyeduhan kopi dengan tekanan dan suhu tinggi. Kopi espresso dibuat dengan menggiling kopi hingga halus...', 
             'gambar' => 'https://www.acouplecooks.com/wp-content/uploads/2020/09/Latte-Art-066s.jpg'],
            ['nama' => 'Macchiato', 
             'harga' => 'Rp. 20.000',
             'deskripsi' => 'Nama kopi Macchiato diambil dari bahasa Italia, “macchiato” memiliki arti “noda” atau “tanda”. Dalam dunia perkopian, macchiato bermakna sebuah elemen...', 
             'gambar' => 'https://www.196flavors.com/wp-content/uploads/2021/05/latte-macchiato-3fp.jpg'],
            ['nama' => 'Latte', 
             'harga' => 'Rp. 25.000', 
             'deskripsi' => 'Dalam bahasa Italia, Caffé artinya “kopi”, dan Latte adalah “susu”, jadi Caffé Latte artinya kopi susu. Caffé latte atau kopi latte ini merupakan salah satu...', 
             'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/Latte_with_winged_tulip_art.jpg/800px-Latte_with_winged_tulip_art.jpg'],
            ['nama' => 'Cappucino',
             'harga' => 'Rp. 19.000', 
             'deskripsi' => 'Cappuccino adalah secangkir kopi susu yang berasal dari Italia dan mulai hadir di Eropa dan Amerika sejak tahun 1980-an. Secangkir kopi cappuccino memiliki...', 
             'gambar' => 'https://noir.web.id/wp-content/uploads/2022/04/jual-cappucino-terdekat.jpg.webp'],
        ];

        return view('amandemy-cafe.index', compact('menu'));
    }
}