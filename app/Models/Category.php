<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug' ];

public function posts()
{
 return $this->hasMany(Post::class);
}


    //*nombre de la tabla en tu base de datos*/
   // protected $table = 'categories';

 
}
