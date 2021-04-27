<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{

    use HasFactory;
    protected $table = "chat-rooms";
    protected $fillable=['id_user1','id_user2','ad_id','created_at'];

}
