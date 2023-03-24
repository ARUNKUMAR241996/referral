@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
 @if(Auth::user()->role_id == 0)
<h3>Welcome to Admin Dashboard</h3>
                @else
<h3>Welcome {{Auth::user()->name}}</h3>

<p><h5>{{Auth::user()->referral_code}}</h5> is your referral code, use this code to invite your friends to earn reward</p>
                @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
