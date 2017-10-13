<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createregistro_usuariosRequest;
use App\Http\Requests\Updateregistro_usuariosRequest;
use App\Repositories\registro_usuariosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class registro_usuariosController extends AppBaseController
{
    /** @var  registro_usuariosRepository */
    private $registroUsuariosRepository;

    public function __construct(registro_usuariosRepository $registroUsuariosRepo)
    {
        $this->registroUsuariosRepository = $registroUsuariosRepo;
    }

    /**
     * Display a listing of the registro_usuarios.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->registroUsuariosRepository->pushCriteria(new RequestCriteria($request));
        $registroUsuarios = $this->registroUsuariosRepository->all();

        return view('registro_usuarios.index')
            ->with('registroUsuarios', $registroUsuarios);
    }

    /**
     * Show the form for creating a new registro_usuarios.
     *
     * @return Response
     */
    public function create()
    {
        return view('registro_usuarios.create');
    }

    /**
     * Store a newly created registro_usuarios in storage.
     *
     * @param Createregistro_usuariosRequest $request
     *
     * @return Response
     */
    public function store(Createregistro_usuariosRequest $request)
    {

        $input = $request->all();

        $registroUsuarios = $this->registroUsuariosRepository->create($input);

        Flash::success('Registro Usuarios saved successfully.');

        return redirect(route('registroUsuarios.index'));
    }

    /**
     * Display the specified registro_usuarios.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $registroUsuarios = $this->registroUsuariosRepository->findWithoutFail($id);

        if (empty($registroUsuarios)) {
            Flash::error('Registro Usuarios not found');

            return redirect(route('registroUsuarios.index'));
        }

        return view('registro_usuarios.show')->with('registroUsuarios', $registroUsuarios);
    }

    /**
     * Show the form for editing the specified registro_usuarios.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $registroUsuarios = $this->registroUsuariosRepository->findWithoutFail($id);

        if (empty($registroUsuarios)) {
            Flash::error('Registro Usuarios not found');

            return redirect(route('registroUsuarios.index'));
        }

        return view('registro_usuarios.edit')->with('registroUsuarios', $registroUsuarios);
    }

    /**
     * Update the specified registro_usuarios in storage.
     *
     * @param  int              $id
     * @param Updateregistro_usuariosRequest $request
     *
     * @return Response
     */
    public function update($id, Updateregistro_usuariosRequest $request)
    {
        $registroUsuarios = $this->registroUsuariosRepository->findWithoutFail($id);

        if (empty($registroUsuarios)) {
            Flash::error('Registro Usuarios not found');

            return redirect(route('registroUsuarios.index'));
        }

        $registroUsuarios = $this->registroUsuariosRepository->update($request->all(), $id);

        Flash::success('Registro Usuarios updated successfully.');

        return redirect(route('registroUsuarios.index'));
    }

    /**
     * Remove the specified registro_usuarios from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $registroUsuarios = $this->registroUsuariosRepository->findWithoutFail($id);

        if (empty($registroUsuarios)) {
            Flash::error('Registro Usuarios not found');

            return redirect(route('registroUsuarios.index'));
        }

        $this->registroUsuariosRepository->delete($id);

        Flash::success('Registro Usuarios deleted successfully.');

        return redirect(route('registroUsuarios.index'));
    }
}
