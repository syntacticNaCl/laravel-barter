{!! Form::open(['url' => 'items', 'method' => 'POST']) !!}
<div class="modal-body">

    <div class="form-group">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    </div>

    <div class="form-group">
        {!! Form::number('quantity', 1, ['class' => 'form-control', 'placeholder' => 'Location']) !!}
    </div>

    <div class="form-group">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
    </div>

    {!! Form::hidden('event_id', $event->id) !!}


</div>
<div class="modal-footer">
    {!! Form::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
