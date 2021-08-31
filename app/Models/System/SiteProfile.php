<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class SiteProfile extends Model
{
    use HasFactory;
    protected $table="site_profile";
    public $incrementing = false;
    protected $keyType = 'string';
}
