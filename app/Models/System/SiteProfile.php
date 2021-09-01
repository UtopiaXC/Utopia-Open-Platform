<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\System\SiteProfile
 *
 * @property string $id
 * @property string $profile_type
 * @property string $profile_description
 * @property string $profile_content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SiteProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SiteProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SiteProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|SiteProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteProfile whereProfileContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteProfile whereProfileDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteProfile whereProfileType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiteProfile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SiteProfile extends Model
{
    use HasFactory;
    protected $table="site_profile";
    public $incrementing = false;
    protected $keyType = 'string';
}
