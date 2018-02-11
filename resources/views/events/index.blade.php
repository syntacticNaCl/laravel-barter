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
                    <div class="card-header">Items
                        <button
                                type="button"
                                class="btn btn-primary btn-md float-right"
                                data-toggle="modal"
                                data-target="#addItemModal">
                            Add Item
                        </button>
                    </div>

                    <div class="card-body">

                        @foreach($items as $item)
                            <li style="list-style-type: none;"><a href="#">{{ $item->name }}</a></li>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="modal fade" id="addItemModal"
     tabindex="-1" role="dialog"
     aria-labelledby="addItemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"
                    id="addItemModalLabel">Add Item</h4>
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            @include('items.forms.create', [
                'submitButtonText' => 'Add'
            ])
        </div>
    </div>
</div>
