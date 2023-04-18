<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

        /**
     * The database table used by the model.
     *
    * @var string
    */
   protected $table = 'posts';

   /**
    * @var array
    */
   protected $fillable = [
       'name',
       'slug',
       'status',
       'title',
       'content',
       'image',
       'target',
       'reference_type',
       'reference_id',
       'prefix',
       'description',
   ];
}
