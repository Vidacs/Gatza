
<table class="table table-responsive" id="registroUsuarios-table">
    <thead>
        <tr>
            <th>Id Registro</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Correo</th>
        <th>Telefono</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($registroUsuarios as $registroUsuarios)
        <tr>
            <td>{!! $registroUsuarios->id_registro !!}</td>
            <td>{!! $registroUsuarios->nombre !!}</td>
            <td>{!! $registroUsuarios->apellidos !!}</td>
            <td>{!! $registroUsuarios->email !!}</td>
            <td>{!! $registroUsuarios->telefono !!}</td>
            <td>
                {!! Form::open(['route' => ['registroUsuarios.destroy', $registroUsuarios->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('registroUsuarios.show', [$registroUsuarios->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('registroUsuarios.edit', [$registroUsuarios->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>