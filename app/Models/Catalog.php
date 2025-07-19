<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

     protected $table = 'catalogs';

    protected $primaryKey = 'catalog_id';

    public $timestamps = false;

    protected $fillable = [
        'company_id',
        'name',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime'
    ];

    // Relacionamento com Company
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

}
