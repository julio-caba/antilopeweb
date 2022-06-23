{!! Form::open(['route' => ['admin.categorias.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('admin.categorias.show', $id) }}"  class='btn mr-3 btn-outline-success btn-sm'  data-toggle="tooltip" data-placement="top" title="Ver">
    <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('admin.categorias.edit', $id) }}" class='btn mr-3 btn-sm btn-outline-info'  data-toggle="tooltip" data-placement="top" title="Editar">
        <i class="fa fa-edit"></i>
    </a>
    <!-- {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!} -->
</div>
{!! Form::close() !!}
