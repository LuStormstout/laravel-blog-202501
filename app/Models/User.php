<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * @property string name
 * @property string email
 * @property string password
 * @property string activation_token
 * @property bool activated
 * @property bool is_admin
 * @property Status[] statuses
 * @property string email_verified_at
 * @property string remember_token
 * @property string created_at
 * @property string updated_at
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 监听用户创建事件, 在用户创建时自动生成激活令牌
     *
     * @return void
     */
    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($user) {
            $user->activation_token = Str::random(10);
        });
    }

    /**
     * 通过邮箱到 gravatar.com 获取头像
     *
     * @param string $size
     * @return string
     */
    public function gravatar(string $size = '100'): string
    {
        $hash = md5(trim(strtolower($this->attributes['email'])));
        return "https://www.gravatar.com/avatar/$hash?s=$size";
    }

    /**
     * The user has many statuses.
     *
     * @return HasMany
     */
    public function statuses(): HasMany
    {
        // 一个用户拥有多条微博, 一对多关系
        return $this->hasMany(Status::class);
    }
}
