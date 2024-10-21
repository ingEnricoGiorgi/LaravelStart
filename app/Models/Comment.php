<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        // appartiene a un utente
        return $this->belongsTo(User::class);
    }
}
