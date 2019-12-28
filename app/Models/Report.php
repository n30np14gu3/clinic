<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Report
 * @package App\Models
 *
 * @property int $id
 * @property int $doctor_id
 * @property int $patient_id
 * @property string $medic_name
 * @property string $to_home
 * @property string $diagnosis
 *
 * @property Doctor $doctor
 * @property Medic $medic
 * @property Patient $patient
 */
class Report extends Model
{
    protected $table = 'reports';

    public function doctor(){
        return $this->belongsTo('App\Models\Doctor', 'doctor_id');
    }

    public function medic(){
        return $this->belongsTo('App\Models\Medic', 'medic_name');
    }

    public function patient(){
        return $this->belongsTo('App\Models\Patient', 'patient_id');
    }
}
