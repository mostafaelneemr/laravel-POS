<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class category extends Model
{
    use HasFactory;
    use Hastranslations;
    protected $guarded = [];
    public $translatable = ['name'];

}
