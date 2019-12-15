@extends('layouts.front')

@section('content')
<div class="vertical-center @if($christmas_day) snow @endif">
    <div class="container">
        <div class="row justify-content-center align-middle">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Santa Claus Current Location</div>
                    <div class="card-body">
                        {{ $current_location->city }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
