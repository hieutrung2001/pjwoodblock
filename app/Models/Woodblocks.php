<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Woodblocks extends Model
{
    use HasFactory;
    public function __construct()
    {
        $this->state = 1;
        $this->created = time();
    }
    public $timestamps = false;
    protected $table = 'woodblocks';
    protected $fillable = [
        'books_id', 'dynasty_id', 'engraved_face', 'quyen', 'code', 'description', 'link', 'front_image', 'back_image', 'state', 'created', 'modified'
    ];
}
