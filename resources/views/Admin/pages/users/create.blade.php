@extends('includes.master')

@section('page_title')
{{ __('dashboard.user') }}
@endsection
@section('small_title')
Create
@endsection
@section('content')


<form action="{{ route('user.store') }}" method="POST">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
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
                <label for="exampleInputEmail1">email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email">
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
                    <input type="password" class="form-control" name="password" >
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
                        <input type="password" class="form-control" name="password_confirmed" >
                        @error('password_confirmed')
                        <div class="alert alert-danger mt-1" role="alert">
                            <h4 class="alert-heading">Alert Danger</h4>
                            <div class="alert-body">
                                {{ $message }}
                            </div>
                        </div>
                        @enderror
                   


        <div class="form-group">
            <label for="">Roles</label>
            
            <select name="roles_list[]" id="id_label_multiple" class="js-example-basic-multiple form-control "  multiple="multiple">

                @foreach ( $roles as $role )
                    <option value="{{ $role->id }}" > {{$role->name}} </option>
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

       
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>





@push('js')

<script>
$(document).on('click','#select-all',function(){

    $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
  });
  
  $("input[type=checkbox]").click(function() {
    if (!$(this).prop("checked")) {
      $("#select-all").prop("checked", false);
    }
  });



  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endpush




@endsection
