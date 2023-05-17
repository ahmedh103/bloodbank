@extends('includes.master')

@section('page_title')
{{ __('dashboard.city') }}
@endsection
@section('small_title')
Create
@endsection
@section('content')


<form action="{{ route('city.store') }}" method="POST">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name">
            @error('name')
            <div class="alert alert-danger mt-1" role="alert">
                <h4 class="alert-heading">Alert Danger</h4>
                <div class="alert-body">
                    {{ $message }}
                </div>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <select name="governorate_id" class="custom-select form-control-border" id="">
              
                @foreach ($governorates as $governorate)
                <option value="{{ $governorate->id }}" @selected('governorate_id')>{{ $governorate->name }}</option>
                @endforeach
                @error('governorate_id')
                <div class="alert alert-danger mt-1" role="alert">
                    <h4 class="alert-heading">Alert Danger</h4>
                    <div class="alert-body">
                        {{ $message }}
                    </div>
                </div>
                @enderror
            </select>
        </div>

        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>










@endsection
