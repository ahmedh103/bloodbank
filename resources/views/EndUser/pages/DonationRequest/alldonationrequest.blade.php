@extends('enduser.includes.master',[
    'bodyClass' => 'donation-requests'
    ])
    @section('content')
<div class="all-requests">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>
                </ol>
            </nav>
        </div>
    
        <!--requests-->
        <div class="requests">
            <div class="head-text">
                <h2>طلبات التبرع</h2>
            </div>
            <div class="content">
                <form class="row filter">
                    <div class="col-md-5 blood">
                        <div class="form-group">
                            <div class="inside-select">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">اختر فصيلة الدم</option>
                                    <option>+A</option>
                                    <option>+B</option>
                                    <option>+AB</option>
                                    <option>-O</option>
                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 city">
                        <div class="form-group">
                            <div class="inside-select">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">اختر المدينة</option>
                                    <option>المنصورة</option>
                                    <option>القاهرة</option>
                                    <option>الإسكندرية</option>
                                    <option>سوهاج</option>
                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 search">
                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <div class="patients">
                    @forelse ($donation_requests as $donation_request)
                    <div class="details">
                        <div class="blood-type">
                            <h2 dir="ltr">B+</h2>
                        </div>
                        <ul>
                            <li><span>اسم الحالة:</span> {{ $donation_request->patient_name }}</li>
                            <li><span>مستشفى:</span> {{ $donation_request->hospital_name }}</li>
                            <li><span>المدينة:</span> {{ $donation_request->city->name }}</li>
                        </ul>
                        <a href="{{ route('show.donation',$donation_request->id) }}">التفاصيل</a>
                    </div>
                    @empty
                 @endforelse
                </div>
                <div class="pages">
                    <nav aria-label="Page navigation example" dir="ltr">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link active" href="#">{{ $donation_requests->links() }}</a></li>
                   
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection