{!! Form::model($item, ['route' => ['items.update', $item->id], 'method' => 'PATCH', 'files' => true])!!}

    <div class="form-group">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    </div>

    <div class="form-group">
        {!! Form::number('quantity', null, ['class' => 'form-control', 'placeholder' => 'Quantity']) !!}
    </div>

    <div class="form-group">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
    </div>


    <div class="form-group">
        {!! Form::file('item_image') !!}
    </div>

    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
