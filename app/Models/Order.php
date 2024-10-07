<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;
    protected $fillable = ['product_name', 'user_id'];

    // Связь с моделью User (если необходимо)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
