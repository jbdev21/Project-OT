<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookPage extends Model
{
    function book()
    {
    	return $this->belongsTo(Book::class);
    }
}
