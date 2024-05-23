<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'comment',
        'posts_id',
    ];

    public function post()
    {
        return $this->belongsTo(Posts::class);
    }

}
