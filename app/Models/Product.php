<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function category(){
        return $this->belongsTo(Category::class);
    }

    protected function rate(): Attribute{
        return Attribute::make(
          set : fn($value) => $value % 6
        );
    }

}
