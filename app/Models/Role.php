<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Role interactive with roles table in database
 *
 * @package App\Models
 */
class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $dates = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'title'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
