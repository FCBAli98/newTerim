<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = 'cities';

    protected $fillable = [
      'name_uz',
      'name_ru',
      'name_en',
      'name_cyrl',
      'phone_kod',
      'c_order',
      'ns11_code',
      'region_id',
      'soato',
    ];
}
