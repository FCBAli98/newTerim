<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizens extends Model
{
      protected $table = 'citizens';
      protected $fillable = [
        'phone_number',
        'passport_seria',
        'passport_number',
        'first_name',
        'second_name',
        'patronymic',
        'address',
        'resource',
        'sync_id',
        'gender',
        'synced',
        'status',
        'sent_region_id',
        'sent_city_id',
        'sent_status',
        'sms_code',
        'lifetime',
        'wanted_region_id',
        'wanted_territory',
        'birth_date',
        'passport',
        'pin',
        'in_notebook',
        'social_protection',
        'contract_number',
        'contract_date',
        'type_employer_id',
        'region_id',
        'city_id',
        'makhalla_id',
        'otryad_id',
        'company_tin',
      ];

}
