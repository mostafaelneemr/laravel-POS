<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class invoice extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function categorie()
    {
        return $this->belongsTo(category::class, 'categorie_id');
    }

    public function product() 
    {
        return $this->belongsTo(product::class , 'product_id');
    }

    public function invoice_details(){
        return $this->hasOne(invoice_details::class);
    }
}
