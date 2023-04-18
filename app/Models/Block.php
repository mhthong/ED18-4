<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

           /**
     * The database table used by the model.
     *
    * @var string
    */
   protected $table = 'blocks';

   /**
    * @var array
    */
   protected $fillable = [
       'name',
       'alias',
       'description',
       'content',
       'status',
       'image',
       'slug',
       'target'
   ];
}

