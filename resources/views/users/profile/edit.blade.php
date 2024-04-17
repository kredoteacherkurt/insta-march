@extends('layouts.app')


@section('title', 'Edit profile')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="{{route('profile.update',$user->id)}}" method="post" class="bg-white rounded-3 shadow p-5" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <h2 class="h3 mb-3 fw-light text-muted">Update Profile</h2>
                <div class="row mb-3">
                    <div class="col-4">
                        @if ($user->avatar)
                            <img src="#" alt="" class="rounded-circle d-block mx-auto avatar-lg">
                        @else
                            <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-lg"></i>
                        @endif
                    </div>
                    <div class="col-auto align-self-end">
                            <input type="file" name="avatar" id="" class="form-control form-control-sm mt-1">
                            <div class="form-text">
                                Acceptable formats: jpeg, gif, png only <br>
                                Max file size: 1048kb
                            </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" name="name" value="{{$user->name}}" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Email</label>
                    <input type="text" name="email" value="{{$user->email}}" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-bold">Introduction</label>
                    <textarea name="introduction" id=""  rows="3" class="form-control" placeholder="{{$user->introduction}}">{{$user->introduction}}</textarea>
                </div>
                <button type="submit" class="btn btn-warning px-5">Save</button>

            </form>
        </div>
    </div>

@endsection
