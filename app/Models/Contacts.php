<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;
            /**
     * The database table used by the model.
     *
    * @var string
    */
   protected $table = 'contacts';

   /**
    * @var array
    */
   protected $fillable = [
       'name',
       'email',
       'phone',
       'address',
       'subject',
       'content',
       'status',
   ];
}
