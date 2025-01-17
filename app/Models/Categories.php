<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = "categories";
    
    protected $fillable = [
        'id',
        'category_name',
        'created_at',
        'updated_at'
    ];

    public function Quantities()
    {
        return $this->hasOne(Quantities::class, 'material_category_id');
    }

}
