<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;


        /**
     * The database table used by the model.
     *
    * @var string
    */
   protected $table = 'tags';

   /**
    * @var array
    */
   protected $fillable = [
       'name',
       'slug',
       'status',
       'title',
       'reference_type',
       'reference_id',
       'prefix',
   ];
}
