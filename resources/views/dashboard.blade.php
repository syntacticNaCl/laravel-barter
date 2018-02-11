@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Groups
                        <button
                                type="button"
                                class="btn btn-primary btn-md float-right"
                                data-toggle="modal"
                                data-target="#addGroupModal">
                            Add Group
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="list-group">
                            @foreach($groups as $group)
                                <a class="list-group-item" href="{{url('groups/' . $group->id)}}">{{ $group->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-default">
                    <div class="card-header">Feed</div>

                    <div class="card-body">
                        <div class="list-group">
                            <a href="#"
                               class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">gtest</h5>
                                    <small>3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget
                                    risus varius blandit.</p>
                                <small>Donec id elit non mi porta.</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">joshtest</h5>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget
                                    risus varius blandit.</p>
                                <small class="text-muted">Donec id elit non mi porta.</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">dantest</h5>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget
                                    risus varius blandit.</p>
                                <small class="text-muted">Donec id elit non mi porta.</small>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="modal fade" id="addGroupModal"
     tabindex="-1" role="dialog"
     aria-labelledby="addGroupModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"
                    id="addGroupModalLabel">Add Group</h4>
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            @include('groups.forms.create', [
                'submitButtonText' => 'Add'
            ])
        </div>
    </div>
</div>

