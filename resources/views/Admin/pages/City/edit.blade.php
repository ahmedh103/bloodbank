@extends('includes.master')

@section('page_title')
{{ __('dashboard.city') }}
@endsection
@section('small_title')
Edite
@endsection
@section('content')


<form action="{{ route('city.update',$city) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" value="{{ $city->name }}" name="name" placeholder="Enter Name">
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
          {{-- <option value="{{ $governorate->id }}" @selected('governorate_id')>{{ $governorate->name }}</option> --}}
          <option value="{{ $governorate->id }}" {{ $governorate->id == $city->governorate_id ? 'selected' : '' }}>{{ $governorate->name }}</option>
          @endforeach
        
      </select>
        <!-- /.card-body -->
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
</form>










@endsection
