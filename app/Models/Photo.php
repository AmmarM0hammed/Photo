<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $table = 'photo';
    protected $fillable = [
        'user_id',
        "tag",
        'image',
        'state',
        "key"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
