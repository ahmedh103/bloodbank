@extends('includes.master')

@section('page_title')
{{ __('dashboard.role') }}
@endsection
@section('small_title')
Edite
@endsection
@section('content')


<form action="{{ route('role.update',$role) }}" method="POST" >
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" value="{{ $role->name }}" name="name" placeholder="Enter Name">
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
            <label for="">Permission</label>
            <div class="row">
                @foreach($perm as $permission)
                <div class="col-sm-3">
                    <div class="form-check">
                        <label class="form-check-label" for="exampleCheck1">

                            <input type="checkbox" value="{{ $permission->id }}"
                                name="permission_list[]"  @if($role->permissions->contains($permission)) checked @endif>{{ $permission->name }}

                        </label>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

        @error('permission_list')
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
