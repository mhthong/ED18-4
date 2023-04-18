<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class MenuLocation extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menu_locations';

    /**
     * @var array
     */
    protected $fillable = [
        'menu_id',
        'location',
    ];

    /**
     * @return BelongsTo
     */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'menu_id')->withDefault();
    }
}
