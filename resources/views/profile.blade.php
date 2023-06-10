@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>
  
                <div class="card-body">
                    <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                        @csrf
  
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
  
                        <div class="row mb-3">
                            <label for="profile_photo" class="col-md-4 col-form-label text-md-end">{{ __('Profile Photo') }}</label>
  
                            <div class="col-md-6">
                                <input id="profile_photo" type="file" class="form-control @error('profile_photo') is-invalid @enderror" name="profile_photo" value="{{ old('profile_photo') }}" required autocomplete="profile_photo">
                                
                                <img src="/profile_photo/{{ Auth::user()->profile_photo }}" style="width:80px;margin-top: 10px;">
  
                                @error('profile_photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
  
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upload Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection