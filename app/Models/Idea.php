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
         'content',
         'like'
     ];


    public function comments()
    {
        //return $this->hasMany(Comment::class, 'idea_id', 'id');
        //Una idea può avere molti commenti associati
        return $this->hasMany(Comment::class);
    }
}
