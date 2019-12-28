<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Medic
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $use_type
 * @property string $action
 * @property string $post_effect
 */
class Medic extends Model
{
    protected $table = 'medics';
}
