<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Patient
 * @package App\Models
 *
 * @property int $id
 * @property int $doctor_id
 * @property string $birth_date
 * @property int $sex
 *
 * @property string $name
 * @property string $address
 */
class Patient extends Model
{
    protected $table = 'patients';
}
