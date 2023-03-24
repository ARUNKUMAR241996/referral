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
<h3>Welcome to Admin Dashboard</h3>
                    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Referral code</th>
      <th scope="col">Points</th>
    </tr>
  </thead>
  <tbody>
    @if(count($users)<=0)
    <tr>
        <td style="text-align: center;" colspan="5">"no records found"</td>
    </tr>
        
    @endif
    @foreach ($users as $key => $user)
    <tr>
      <th scope="row">{{($users->currentpage() - 1) * $users->perpage() + $loop->index + 1}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->referral_code}}</td>
      <td>{{$user->points}}</td>
    </tr>
    @endforeach
    
   
  </tbody>
</table>
{{$users->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
