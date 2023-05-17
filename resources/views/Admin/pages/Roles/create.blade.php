@extends('includes.master')

@section('page_title')
{{ __('dashboard.role') }}
@endsection
@section('small_title')
Create
@endsection
@section('content')


<form action="{{ route('role.store') }}" method="POST">
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
            <label for="">Permission</label>
            <br>
            <input id="select-all" type="checkbox"><label for='selectAll'>Select All</label>
            <br>
            <div class="row">
                @foreach($perm as $permission)
                <div class="col-sm-3">
                    <div class="form-check">
                        <label class="form-check-label" for="exampleCheck1">

                            <input type="checkbox" value="{{ $permission->id }}"
                                name="permission_list[]">{{ $permission->name }}

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
</script>
@endpush




@endsection
