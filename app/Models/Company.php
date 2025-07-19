<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'cnpj',
        'contact_email',
        'phone_number',
        'is_active',
        'has_active_subscription',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'has_active_subscription' => 'boolean',
    ];

    public function catalogs()
    {
        return $this->hasMany(Catalog::class,'company_id', 'id');
    }
}
