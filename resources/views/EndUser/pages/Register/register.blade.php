@extends('enduser.includes.master',[
'bodyClass' => 'create'
])
@section('content')
<!--form-->
<div class="form">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                </ol>
            </nav>
        </div>
        <div class="account-form">
            <form method="POST" action="{{ route('enduser.register') }}">
                @csrf
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="الإسم">
                    @error('name')
                    <div class="alert alert-danger mt-1" role="alert">
                        <h4 class="alert-heading">Alert Danger</h4>
                        <div class="alert-body">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="البريد الإلكترونى">
                    @error('email')
                    <div class="alert alert-danger mt-1" role="alert">
                        <h4 class="alert-heading">Alert Danger</h4>
                        <div class="alert-body">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror

                <input placeholder="تاريخ الميلاد" name="d_o_b" class="form-control" type="text"
                    onfocus="(this.type='date')" id="date">
                    @error('d_o_b')
                    <div class="alert alert-danger mt-1" role="alert">
                        <h4 class="alert-heading">Alert Danger</h4>
                        <div class="alert-body">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror
                    <select class="form-control"  name="blood_type_id">
                        <option selected value="">فصيلة الدم</option>
                        @foreach ( $bloodTypes as $bloodType )
                        <option value="{{ $bloodType->id }}" id="" @selected('blood_type_i')> {{$bloodType->name}} </option>
                        @endforeach
                    </select>
                    @error('blood_type_id')
                    <div class="alert alert-danger mt-1" role="alert">
                        <h4 class="alert-heading">Alert Danger</h4>
                        <div class="alert-body">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror
                <select class="form-control" id="governorates">
                    <option selected value="">المحافظة</option>

                    @foreach ( $governorates as $governorate )
                    <option value="{{ $governorate->id }}" id="" @selected('governorate_id')> {{$governorate->name}} </option>
                    @endforeach
                </select>
                <select class="form-control" id="cities" name="city_id">
                    <option selected value="">المدينة</option>
                </select>
                @error('city_id')
                <div class="alert alert-danger mt-1" role="alert">
                    <h4 class="alert-heading">Alert Danger</h4>
                    <div class="alert-body">
                        {{ $message }}
                    </div>
                </div>
                @enderror
                <input type="text" class="form-control" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="رقم الهاتف">
                    @error('phone')
                    <div class="alert alert-danger mt-1" role="alert">
                        <h4 class="alert-heading">Alert Danger</h4>
                        <div class="alert-body">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror
                <input placeholder="آخر تاريخ تبرع" name="last_donation_date" class="form-control" type="text"
                    onfocus="(this.type='date')" id="last_date">
                    @error('last_donation_date')
                    <div class="alert alert-danger mt-1" role="alert">
                        <h4 class="alert-heading">Alert Danger</h4>
                        <div class="alert-body">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror
                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                    placeholder="كلمة المرور">
                    @error('password')
                    <div class="alert alert-danger mt-1" role="alert">
                        <h4 class="alert-heading">Alert Danger</h4>
                        <div class="alert-body">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror
                <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1"
                    placeholder="تأكيد كلمة المرور">
                    @error('password_confirmatio')
                    <div class="alert alert-danger mt-1" role="alert">
                        <h4 class="alert-heading">Alert Danger</h4>
                        <div class="alert-body">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror
                <div class="create-btn">
                    <input type="submit" value="إنشاء">
                </div>
            </form>
        </div>
    </div>
</div>
@push('js')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

 <script>
 $("#governorates").change(function() {

    var governorateId= $("#governorates").val();

    console.log("selected gov:"+ governorateId);
    
    if(governorateId) {
        $.ajax( {
                type: 'GET',
                url: '{{ url('api/cities?governorate_id=') }}'+ governorateId,
                success: function(data) {
                    console.log('object :>> ', data);
                    if(data.status ==1 ) {
                        $("#cities").empty();
                        $("#cities").append('<option value=""> المدينة </option>');
                        $.each(data.data, function(index, city) {
                                console.log(city);
                                $("#cities").append('<option value="'+ city.id + '">'+ city.name + '</option>');``
                            }
                        );
                    }

                }
                ,
                error: function(jqXhr,textStatus,errorMessage) {
                    alert(errorMessage);
                }
            }

        );
    }

    else {
        $("#cities").empty();
        $("#cities").append('<option value=""> المدينة </option>');
    }

}

);

</script>
@endpush

@stop
