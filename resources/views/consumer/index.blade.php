@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vat Validation</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-lg-12 col-sm-12">
                  {!!Form::open(['method'=>'POST','data-parsley-validate'=>"",'url'=>'/vat-validation','class'=>"form-inline"])!!}
                        <div class="form-group">
                        <label for="email">Country Code:</label>
                        <input type="hidden"  value="32lWxkUMalCPYkSyP2mSrVOzMOcjeKJ2lK4SX49OmKSHGEwcapFLPG6SvPms" name="api_token" >
                        <input type="text" class="form-control" id="countryCode" placeholder="FR" name="countryCode" required>
                        </div>
                        <div class="form-group">
                        <label for="pwd">Vat Number:</label>
                        <input type="text" class="form-control" id="vatNumber" placeholder="1234567" name="vatNumber" required>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                  {!! Form::close() !!}
                    @if(isset($response))
                      {{$response->valid ? "Valid":"Invalid"}}
                    @endif
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

