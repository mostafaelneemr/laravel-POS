<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class invoice_details extends Model
{
    use HasFactory;
    protected $table="invoice_details";
    protected $guarded=[];

    public function invoice()
    {
        return $this->belongsTo(invoice::class, 'invoice_id');
    }
}
