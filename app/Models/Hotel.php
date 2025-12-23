<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['name', 'address', 'image'];

    public function roomTypes()
    {
        return $this->hasMany(RoomType::class);
    }
}
