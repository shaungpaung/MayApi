<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "status",
        "pawrent",
        "breed",
        "gender",
        "contact",
        "address",
        "dob",
        "city",
        "township"
    ];
}
