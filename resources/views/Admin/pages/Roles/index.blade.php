@extends('includes.master')

@section('page_title')
{{ __('dashboard.role') }}
@endsection

@section('content')



<div class="container">

    <a type="button" href="{{ route('role.create') }}" class="btn filter accept  btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add role
    </a>

    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>

                    <th style="width: 20%">
                        Name
                    </th>
                    <th style="width: 20%">
                        Name
                    </th>

                    {{-- <th style="width: 20%">
                        Governorates Name
                    </th> --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)




                <tr class=" delete-row ">
                    <td>
                        {{ $role->name }}
                    </td>
                  
                    <td class="project-actions text-right">

                        <a class="btn btn-info btn-sm" href="{{ route('role.edit',$role) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                          
                        </a>
                      
                       
                       
                  
                        {{-- <form  id="delete"
                        action="{{ route('role.delete', $role) }}"
                        method="POST">
                        @csrf
                        @method('delete')
                        <a class="btn btn-danger show_confirm btn-sm" href="javascript:void(0)" onclick="document.getElementById('delete').submit();">
                            <i class="fas fa-trash">
                            </i>
                         
                        </a>
                        </form> --}}
                        <button   id="{{ $role->id }}" data-token="{{ csrf_token() }}" data-route="{{ route('role.delete',$role->id) }}" class="btn btn-danger destory show_confirm btn-sm"   >    <i class="fas fa-trash">
                        </i> </button>

                    </td> 
                </tr>
                @empty
                <h1>No Data</h1>
                @endforelse


            </tbody>
        </table>
    </div>
</div>










@endsection
