<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_name',
        'category_id',
        'description',
        'coordinate_location',
        'address',
        'npwp',
        'balance',
        'owner_id',
        'manager_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
}
