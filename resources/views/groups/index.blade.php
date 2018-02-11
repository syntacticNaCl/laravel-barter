@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Events
                        <button
                                type="button"
                                class="btn btn-primary btn-md float-right"
                                data-toggle="modal"
                                data-target="#addEventModal">
                            Add Event
                        </button>
                    </div>

                    <div class="card-body">

                        @foreach($events as $event)
                            <li style="list-style-type: none;"><a href="{{url('events/' . $event->id)}}">{{ $event->name }}</a></li>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="modal fade" id="addEventModal"
     tabindex="-1" role="dialog"
     aria-labelledby="addEventModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"
                    id="addEventModalLabel">Add Event</h4>
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            @include('events.forms.create', [
                'submitButtonText' => 'Add'
            ])
        </div>
    </div>
</div>
