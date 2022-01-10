<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookBorrowDetails extends Model
{
    protected $table = 'book_borrow_details';

    protected $fillable = ['book_borrow_id', 'book_id', 'qty'];
}
