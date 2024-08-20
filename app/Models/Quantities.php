<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quantities extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'quantities';
    protected $fillable = [
        'id','material_category_id','material_id','date','in_out_quantity','created_at','updated_at','deleted_at'
    ];
    
    public function Categories()
    {
        return $this->belongsTo(Categories::class, 'material_category_id','id');
    }

    public function Materials()
    {
        return $this->belongsTo(Materials::class, 'material_id', 'id');
    }
}
