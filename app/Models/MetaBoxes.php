<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaBoxes extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'meta_boxes';

    /**
     * @var array
     */
    protected $fillable = [
        'reference_id',
        'meta_key',
        'meta_value',
        'reference_type',
    ];

    /**
     * @var array
     */
/*     protected $casts = [
        'status' => BaseStatusEnum::class,
    ]; */


}
