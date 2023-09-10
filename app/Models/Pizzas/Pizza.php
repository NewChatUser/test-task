<?php

namespace App\Models\Pizzas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    protected $table = 'pizzas';
    protected string $id = 'id';
    protected string $title ='title';

    protected $fillable = [];
}
