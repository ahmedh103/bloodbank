@extends('includes.master')

@section('page_title')
{{ __('dashboard.post') }}
@endsection
@section('small_title')
Create
@endsection
@section('content')


<form action="{{ route('post.store') }}" method="POST"  enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Enter Name">
            @error('title')
            <div class="alert alert-danger mt-1" role="alert">
                <h4 class="alert-heading">Alert Danger</h4>
                <div class="alert-body">
                    {{ $message }}
                </div>
            </div>
            @enderror
        </div>



        <div class="form-group">
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
                <option value="{{ $category->id }}" @selected('category_id')>{{ $category->name }}</option>
                @endforeach
                @error('category_id')
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
