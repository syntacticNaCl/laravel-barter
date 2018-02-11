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
            <div class="col-md-12">
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
                        <div class="row">


                            @foreach($items as $item)
                                <div class="col-md-4">
                                    <div class="card" style="width: 18rem; margin-top: 20px;">
                                        <div class="card-body">
                                            @if($item->image)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($item->image)  }}" alt="" width="auto" height="100px"/>
                                            @endif
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <p class="card-text">{{ $item->description }}</p>
                                            <p class="card-text">{{ $item->creator->name }}</p>
                                            <p class="float-left" style="margin-top: 5px;">Quantity {{ $item->quantity }}</p>
                                        </div>
                                        <div class="card-footer">

                                            {{ Form::open(array('url' => 'item/' . $item->id . '/claim')) }}
                                            {{--<p class="float-left" style="margin-top: 5px;">Available {{ $item->isAvailable()}}</p>--}}
                                            <p class="float-left" style="margin-top: 5px;">{{ $item->availableCount() }} Left</p>
                                            @if($item->isAvailable())
                                            <button type="submit" class="btn btn-primary float-right">Claim</button>
                                            @endif
                                            {{ Form::close() }}

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

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

