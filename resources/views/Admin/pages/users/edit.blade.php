@extends('includes.master')

@section('page_title')
{{ __('dashboard.role') }}
@endsection
@section('small_title')
Edite
@endsection
@section('content')


<form action="{{ route('user.update',$user) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card-body">

        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" class="form-control" value="{{$user->name}}" name="name" placeholder="Enter Name">
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
                <label for="exampleInputEmail1">email</label>
                <input type="email" class="form-control" name="email"value="{{ $user->email}}" placeholder="Enter Email">
                @error('email')
                <div class="alert alert-danger mt-1" role="alert">
                    <h4 class="alert-heading">Alert Danger</h4>
                    <div class="alert-body">
                        {{ $message }}
                    </div>
                </div>
                @enderror
         


                <div class="form-group">
                    <label for="exampleInputEmail1">password</label>
                    <input type="password" class="form-control" name="password">
                    @error('password')
                    <div class="alert alert-danger mt-1" role="alert">
                        <h4 class="alert-heading">Alert Danger</h4>
                        <div class="alert-body">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror

                    <div class="form-group">
                        <label for="exampleInputEmail1">password confirmation</label>
                        <input type="password" class="form-control" name="password_confirmation">
                        @error('password-confirmation')
                        <div class="alert alert-danger mt-1" role="alert">
                            <h4 class="alert-heading">Alert Danger</h4>
                            <div class="alert-body">
                                {{ $message }}
                            </div>
                        </div>
                        @enderror


                    <div class="form-group">
                        <label for="">Roles</label>
                        <select name="roles_list[]" id="" class="js-example-basic-multiple form-control my-2" multiple>
                            @foreach ( $roles as $role )
                            <option value="{{ $role->id }}"  {{ old('role') || in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}> {{$role->name}} </option>
                            @endforeach
                        </select>
                        @error('roles-list')
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

@push('js')
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endpush






@endsection
