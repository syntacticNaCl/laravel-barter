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
                    <div class="card-header">{{ $item->name }}
                    </div>

                    <div class="card-body">

                        @include('items.forms.update', [
                            'submitButtonText' => 'Update',
                        ])

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

