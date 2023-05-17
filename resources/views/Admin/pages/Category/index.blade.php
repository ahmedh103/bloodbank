@extends('includes.master')

@section('page_title')
{{ __('dashboard.category') }}
@endsection

@section('content')



<div class="container">

    <a type="button" href="{{ route('category.create') }}" class="btn filter accept  btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Category
    </a>


    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>

                    <th style="width: 20%">
                        Name
                    </th>
                   
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)




                <tr>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        {{ $category->slug }}
                    </td>

                    <td class="project-actions text-right">

                        <a class="btn btn-info btn-sm" href="{{ route('category.edit',$category) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                          
                        </a>
                        <form  id="delete{{ $category->id }}"
                        action="{{ route('category.delete', $category->id) }}"
                        method="POST">
                        @csrf
                        @method('delete')>
                        <a class="btn btn-danger show_confirm btn-sm" href="javascript:void(0)" onclick="document.getElementById('delete{{ $category->id }}').submit();"
                            <i class="fas fa-trash">
                            </i>
                         
                        </a>
                        </form> 
                        {{-- <button   id="{{ $category->id }}" data-token="{{ csrf_token() }}" data-route="{{ route('category.delete',$category->id) }}" class="btn btn-danger destory show_confirm btn-sm"   >    <i class="fas fa-trash">
                        </i> </button> --}}
                        
                    </td> 
                </tr>
                @empty
                <h1>No Data</h1>
                @endforelse


            </tbody>
        </table>
    </div>
</div>



<div class="modal fade ltr" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Governorates</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

     
            <div class="modal-body">
                <form action="" method="POST" >
                    @csrf
                
                  
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label"> name</label>
                        <input type="text" name="name" placeholder="name" class="form-control"
                            id="name">
                    </div>
                   
                   

                    <div class="modal-footer">


                    </div>
                    <button type="submit" style="opacity: 0.7" id="send" class="btn btn-success">ارسال </button>
                    <button type="button" style="opacity: 0.7" class="btn btn-danger" id="remove"
                        data-bs-dismiss="modal">الغاء</button>
                </form>
            </div>

        </div>
    </div>
</div>






@endsection
