<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Session
 * package App.
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property string $payload
 * @property int $last_activity
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Session newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Session newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Session query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Session whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Session whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Session whereLastActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Session wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Session whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\Session whereUserId($value)
 * @mixin \Eloquent
 */
class Session extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sessions';

    /**
     * @var array
     */
    protected $guarded = ['*'];
}
