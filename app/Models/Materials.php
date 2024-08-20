<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Quantities;

class Materials extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'materials';
    protected $fillable = [
        'id',
        'material_name',
        'opening_balance',
        'created_at',
        'updated_at'
    ];

    public function Quantities()
    {
        return $this->hasOne(Quantities::class, 'material_id');
    }
}
