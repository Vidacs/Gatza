<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class registro_usuarios
 * @package App\Models
 * @version October 12, 2017, 7:39 pm UTC
 *
 * @property integer id_registro
 * @property string nombre
 * @property string apellidos
 * @property string correo
 * @property integer telefono
 */
class registro_usuarios extends Model
{
    use SoftDeletes;

    public $table = 'registro_usuarios';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id',
        'nombre',
        'apellidos',
        'email',
        'telefono'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'apellidos' => 'string',
        'email' => 'string',
        'telefono' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
