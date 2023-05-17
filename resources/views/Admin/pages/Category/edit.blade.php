@extends('includes.master')

@section('page_title')
{{ __('dashboard.category') }}
@endsection
@section('small_title')
Edite
@endsection
@section('content')


<form action="{{ route('category.update',$category) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" value="{{ $category->name }}" name="name" placeholder="Enter Name">
            @error('name')
            <div class="alert alert-danger mt-1" role="alert">
                <h4 class="alert-heading">Alert Danger</h4>
                <div class="alert-body">
                    {{ $message }}
                </div>
            </div>
            @enderror
        </div>
      
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
</form>










@endsection
