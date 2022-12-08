@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Chenge Password') }}</div>
                <div class="card-body">
                    <!-- success  -->
                    @if(session()->has('success'))
                        <strong style="color:green;">{{session()->get('success')}}</strong>
                    @endif
                    <!-- error -->
                    @if(session()->has('error'))
                        <strong style="color:red;">{{session()->get('error')}}</strong>
                    @endif
                    <form action="{{route('update.password')}}" method="POST">
                        @csrf
                        <div class="">
                            <label for="">Current Password</label>
                            <input type="password" name="current_password" class="form-control" placeholder="Current Password" value="{{old('current_password')}}" required>
                        </div><br>
                        <div class="">
                            <label for="">New Password</label>
                            <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br>
                        <div class="">
                            <label for="">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                        </div><br>
                        <button type="submit" class="btn btn-primary" name="submit">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection