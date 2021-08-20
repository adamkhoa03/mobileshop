<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Permission model, interactive with permissions table in database
 *
 * @package App\Models
 */
class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'title'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
