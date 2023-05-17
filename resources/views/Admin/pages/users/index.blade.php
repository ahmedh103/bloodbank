@extends('includes.master')

@section('page_title')
{{ __('dashboard.role') }}
@endsection

@section('content')



<div class="container">

    <a type="button" href="{{ route('user.create') }}" class="btn filter accept  btn-primary" data-bs-toggle="modal"
        data-bs-target="#exampleModal">
        Add user
    </a>

    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>

                    <th style="width: 20%">
                        Name
                    </th>
                    <th style="width: 20%">
                        email
                    </th>
                    <th style="width: 20%">
                        Role
                    </th>


                    {{-- <th style="width: 20%">
                        Governorates Name
                    </th> --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)



                <tr>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td >
                        @foreach($user->roles as $role)
                   <span  class="badge bg-success" > {{ $role->name }}</span>  
                        @endforeach
                    </td>

                    <td class="project-actions text-right">

                        <a class="btn btn-info btn-sm" href="{{ route('user.edit',$user) }}">
                            <i class="fas fa-pencil-alt">
                            </i>

                        </a>




                        {{-- <form  id="delete"
                        action="{{ route('role.delete', $role) }}"
                        method="POST">
                        @csrf
                        @method('delete')
                        <a class="btn btn-danger show_confirm btn-sm" href="javascript:void(0)"
                            onclick="document.getElementById('delete').submit();">
                            <i class="fas fa-trash">
                            </i>

                        </a>
                        </form> --}}
                        <button id="{{ $user->id }}" data-token="{{ csrf_token() }}"
                            data-route="{{ route('user.delete',$user->id) }}"
                            class="btn btn-danger destory show_confirm btn-sm"> <i class="fas fa-trash">
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
