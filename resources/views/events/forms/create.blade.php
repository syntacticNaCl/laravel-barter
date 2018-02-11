{!! Form::open(['url' => 'events', 'method' => 'POST']) !!}
<div class="modal-body">

    <div class="form-group">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    </div>

    <div class="form-group">
        {!! Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Location']) !!}
    </div>

    <div class="form-group">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
    </div>

    <div class="form-group">
        {!! Form::date('event_start', \Carbon\Carbon::now(), ['class' => 'form-control', 'placeholder' => 'Event Start', 'id' => 'event_start']) !!}
    </div>

    <div class="form-group">
        {!! Form::date('event_end', null, ['class' => 'form-control', 'placeholder' => 'Event End', 'id' => 'event_end']) !!}
    </div>


    {!! Form::hidden('group_id', $group->id) !!}

    <script type="text/javascript">

      $( "#event_start" ).datepicker();
      $( "#event_end" ).datepicker();

    </script>


</div>
<div class="modal-footer">
    {!! Form::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
