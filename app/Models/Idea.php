<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;
/*
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
*/
    //o guarded o fillable meglio guarded
    // Definisci i campi riempibili
     protected $fillable = [
         'user_id',
         'content',
         'like'
     ];


    public function comments()
    {
        //Una idea può avere molti commenti associati
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        //Una idea può avere molti commenti associati
        return $this->belongsTo(User::class);
    }

}
