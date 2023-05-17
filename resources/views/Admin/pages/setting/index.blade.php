@extends('includes.master')

@section('page_title')
{{ __('dashboard.governorate') }}
@endsection

@section('content')



<div class="container">

   


    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>

                    <th style="width: 20%">
                        about_app
                    </th>
                    <th style="width: 20%">
                        phone
                    </th>
                    <th style="width: 20%">
                        email
                    </th>
                    <th style="width: 20%">
                        fb_link
                    </th>
                    <th style="width: 20%">
                        tw_link
                    </th>
                    <th style="width: 20%">
                        insta_link
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($settings as $setting)




                <tr>
                    <td>
                        {{ $setting->about_app }}
                    </td>
                    <td>
                        {{ $setting->phone }}
                    </td>
                    <td>
                        {{ $setting->email }}
                    </td>
                    <td>
                        {{ $setting->fb_link }}
                    </td>
                    <td>
                        {{ $setting->tw_link }}
                    </td>
                    <td>
                        {{ $setting->insta_link }}
                    </td>


                    <td class="project-actions text-right">

                        <a class="btn btn-info btn-sm" href="{{ route('setting.edit',$setting) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                    </td>
                </tr>
                @empty
                <h1>No Data</h1>
                @endforelse


            </tbody>
        </table>
        {{$settings->links()  }}

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
