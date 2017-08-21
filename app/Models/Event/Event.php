<?php

namespace App\Models\Event;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $creator
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 */
class Event extends Model
{
    /**
     * Поля, защищенные на запись.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Связь с таблицей 'users'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
