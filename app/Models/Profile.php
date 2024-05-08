<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'gender',
        'umur',
        'tgl_lahir',
        'alamat',
        'user_id'
    ];

    public function toko()
    {
        return $this->hasOne(Toko::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}