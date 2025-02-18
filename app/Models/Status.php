<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * Class Status
 *
 * @property string content
 * @property int user_id
 * @property User user
 * @property string created_at
 * @property string updated_at
 */
class Status extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content'];

    /**
     * The attributes that are mass assignable.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        // 一条微博属于一个用户, 从微博的角度来看, 一条微博只有一个作者, 是一对一的关系, 所以使用 belongsTo
        return $this->belongsTo(User::class);
    }
}
