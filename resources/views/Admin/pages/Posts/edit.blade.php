@extends('includes.master')

@section('page_title')
{{ __('dashboard.city') }}
@endsection
@section('small_title')
Edite
@endsection
@section('content')


<form action="{{ route('post.update',$post) }}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" value="{{ $post->title }}" name="title" placeholder="Enter Name">
            @error('title')
            <div class="alert alert-danger mt-1" role="alert">
                <h4 class="alert-heading">Alert Danger</h4>
                <div class="alert-body">
                    {{ $message }}
                </div>
            </div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <div class=" input-group mb-3 mt-4">
                <img src="{{asset($post->image)}}" width="100px" height="100px">
                </div>
            <label for="exampleFormControlInput2">{{__('dashboard.image')}}</label>
            <input type="file" class="form-control" name="image"  id="exampleFormControlInput2" >
            @error('image')
            <div class="alert alert-danger mt-1" role="alert">
                <h4 class="alert-heading">Alert Danger</h4>
                <div class="alert-body">
                    {{ $message }}
                </div>
            </div>
            @enderror
        </div>








        <div class="form-group">
        <select name="category_id" class="custom-select form-control-border" id="">
              
          @foreach ($categories as $category)
          {{-- <option value="{{ $governorate->id }}" @selected('governorate_id')>{{ $governorate->name }}</option> --}}
          <option value="{{ $category->id }}" {{ $category->id == $post->governorate_id ? 'selected' : '' }}>{{ $category->name }}</option>
          @endforeach
        
      </select>
        <!-- /.card-body -->
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
</form>










@endsection
