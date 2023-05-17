@extends('includes.master')

@section('page_title')
{{ __('dashboard.contact') }}
@endsection

@section('content')



<div class="container">




    <div class="card-body p-0">
        <table id="dataTable" class="table  table-striped projects">
            <thead>
                <tr>

                    <th style="width: 20%">
                        subject
                    </th>
                    <th style="width: 20%">
                        message
                    </th>
                  


                    {{-- <th style="width: 20%">
                        Governorates Name
                    </th> --}}
                </tr>
            </thead>
            <tbody>
      
                @forelse ($contacts as $contact)

                <tr>
                    <td>
                        {{ $contact->subject }}
                    </td>

                    <td>
                        {{ $contact->message }}
                    </td>
                   
                    <td class="project-actions text-right">






                        <button id="{{ $contact->id }}" data-token="{{ csrf_token() }}"
                            data-route="{{ route('contact.delete',$contact->id) }}"
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
