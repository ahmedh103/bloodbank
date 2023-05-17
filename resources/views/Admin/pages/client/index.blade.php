@extends('includes.master')

@section('page_title')
{{ __('dashboard.client') }}
@endsection

@section('content')



<div class="container">




    <div class="card-body p-0">
        <a href="{{ route('client.activeAll') }}"  class="btn btn-primary"> Active All</a>
        <table id="dataTable" class="table  table-striped projects">
            <thead>
                <tr>

                    <th style="width: 20%">
                        Name
                    </th>
                    <th style="width: 20%">
                        phone
                    </th>
                    <th style="width: 20%">
                        email
                    </th>
                    <th style="width: 20%">
                        blood_types
                    </th>


                    {{-- <th style="width: 20%">
                        Governorates Name
                    </th> --}}
                </tr>
            </thead>
            <tbody>
      
                @forelse ($clients as $client)

                <tr>
                    <td>
                        {{ $client->name }}
                    </td>

                    <td>
                        {{ $client->phone }}
                    </td>
                    <td>
                        {{ $client->email }}
                    </td>
                    <td>
                        {{ $client->bloodType->name }}
                    </td>
                    <td>
                        @if($client->status == 0 )
                        <a href="{{route("client.approve",$client)}}" class="badge badge-light-dark">Rejected</a>
                        @elseif($client->status == 1)
                        <a href="{{route("client.reject",$client)}}" class="badge badge-light-primary">Approved</a>
                        @endif
                    </td>
                    <td class="project-actions text-right">






                        <button id="{{ $client->id }}" data-token="{{ csrf_token() }}"
                            data-route="{{ route('client.delete',$client->id) }}"
                            class="btn btn-danger destory show_confirm btn-sm"> <i class="fas fa-trash"></i> </button>

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
