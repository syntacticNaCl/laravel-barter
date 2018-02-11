{!! Form::open(['url' => 'groups', 'method' => 'POST']) !!}
<div class="modal-body">

    <div class="form-group">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    </div>

</div>
<div class="modal-footer">
    {!! Form::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
