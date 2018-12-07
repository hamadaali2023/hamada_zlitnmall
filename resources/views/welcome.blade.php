@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>
                {{--  get data from the api file   --}}
                <?php
                $api=file_get_contents('http://localhost:8000/api/testapi');
                $api=json_decode($api);
                ?>
                {{$api->massage}}

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
