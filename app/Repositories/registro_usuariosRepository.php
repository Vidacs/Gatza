<?php

namespace App\Repositories;

use App\Models\registro_usuarios;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class registro_usuariosRepository
 * @package App\Repositories
 * @version October 12, 2017, 7:39 pm UTC
 *
 * @method registro_usuarios findWithoutFail($id, $columns = ['*'])
 * @method registro_usuarios find($id, $columns = ['*'])
 * @method registro_usuarios first($columns = ['*'])
*/
class registro_usuariosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_registro',
        'nombre',
        'apellidos',
        'correo',
        'telefono'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return registro_usuarios::class;
    }
}
