<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Users\UserProfile
 *
 * @property string $id
 * @property string $user_id
 * @property string|null $user_nickname
 * @property string|null $user_avatar
 * @property string|null $user_sex
 * @property string|null $user_birthday
 * @property string|null $user_job
 * @property string|null $user_city
 * @property string|null $user_main_page
 * @property string|null $user_github
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUserAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUserBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUserCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUserGithub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUserJob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUserMainPage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUserNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUserSex($value)
 * @mixin \Eloquent
 */
class UserProfile extends Model
{
    use HasFactory;
    protected $table="users_profile";
    public $incrementing = false;
    protected $keyType = 'string';
}
