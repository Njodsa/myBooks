<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  protected $fillable = ['name', 'authorname', 'isbn','genres','price'];
}
