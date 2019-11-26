<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'imie','nazwisko', 'email','wiek','komentarz','status','dodano','plec','zaplata'
    ];
    protected $table = 'persons';
}