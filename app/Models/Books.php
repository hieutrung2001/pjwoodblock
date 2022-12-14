<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    public function __construct()
    {
        $this->state = 1;
        $this->created = time();
    }

    public $timestamps = false;
    protected $table = 'books';
    protected $fillable = [
        'name', 'description', 'state', 'created', 'modified'
    ];
}
