<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regions extends Model
{
    protected $table = 'regions';

    protected $fillable = [
      'name_uz',
      'name_en',
      'name_ru',
      'name_crly',
      'kc_key',
      'c_order',
      'ns10_code',
      'soato',
    ];
}
