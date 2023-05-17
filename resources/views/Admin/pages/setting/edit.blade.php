@extends('includes.master')

@section('page_title')
{{ __('dashboard.governorate') }}
@endsection
@section('small_title')
Edite
@endsection
@section('content')


<form action="{{ route('setting.update',$setting) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">about_app</label>
            <input type="text" class="form-control" value="{{ $setting->about_app }}" name="about_app">
            @error('about_app')
            <div class="alert alert-danger mt-1" role="alert">
                <h4 class="alert-heading">Alert Danger</h4>
                <div class="alert-body">
                    {{ $message }}
                </div>
            </div>
            @enderror


            <div class="form-group">
                <label for="exampleInputEmail1">phone</label>
                <input type="text" class="form-control" value="{{ $setting->phone }}" name="phone">
                @error('phone')
                <div class="alert alert-danger mt-1" role="alert">
                    <h4 class="alert-heading">Alert Danger</h4>
                    <div class="alert-body">
                        {{ $message }}
                    </div>
                </div>
                @enderror


                <div class="form-group">
                    <label for="exampleInputEmail1">email</label>
                    <input type="text" class="form-control" value="{{ $setting->email }}" name="email">
                    @error('email')
                    <div class="alert alert-danger mt-1" role="alert">
                        <h4 class="alert-heading">Alert Danger</h4>
                        <div class="alert-body">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror


                    <div class="form-group">
                        <label for="exampleInputEmail1">fb_link</label>
                        <input type="text" class="form-control" value="{{ $setting->fb_link }}" name="fb_link">
                        @error('fb_link')
                        <div class="alert alert-danger mt-1" role="alert">
                            <h4 class="alert-heading">Alert Danger</h4>
                            <div class="alert-body">
                                {{ $message }}
                            </div>
                        </div>
                        @enderror



                        <div class="form-group">
                            <label for="exampleInputEmail1">tw_link</label>
                            <input type="text" class="form-control" value="{{ $setting->tw_link }}" name="tw_link">
                            @error('tw_link')
                            <div class="alert alert-danger mt-1" role="alert">
                                <h4 class="alert-heading">Alert Danger</h4>
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
                            @enderror


                            <div class="form-group">
                                <label for="exampleInputEmail1">insta_link</label>
                                <input type="text" class="form-control" value="{{ $setting->insta_link }}"
                                    name="insta_link">
                                @error('insta_link')
                                <div class="alert alert-danger mt-1" role="alert">
                                    <h4 class="alert-heading">Alert Danger</h4>
                                    <div class="alert-body">
                                        {{ $message }}
                                    </div>
                                </div>
                                @enderror

                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
</form>










@endsection
