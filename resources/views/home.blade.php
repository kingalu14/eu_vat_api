@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home
                
                <span class="float-right btn btn-primary text-white"> <a href="{{route('vat-validation')}}" class="text-white">Validate Now</a></span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                       Project Documentation
                    
                    
                    
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
