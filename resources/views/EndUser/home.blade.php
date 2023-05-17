   @extends('enduser.includes.master')
   @section('content')
       <!--intro-->
       <div class="intro">
           <div id="slider" class="carousel slide pointer-event" data-ride="carousel">
               <ol class="carousel-indicators">
                   <li data-target="#slider" data-slide-to="0" class=""></li>
                   <li data-target="#slider" data-slide-to="1" class="active"></li>
                   <li data-target="#slider" data-slide-to="2" class=""></li>
               </ol>
               <div class="carousel-inner">
                   <div class="carousel-item carousel-1">
                       <div class="container info">
                           <div class="col-lg-5">
                               <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                               <p>
                                   هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                                   الشكل الخارجي للنص.
                               </p>
                               <a href="#">المزيد</a>
                           </div>
                       </div>
                   </div>
                   <div class="carousel-item carousel-2 active">
                       <div class="container info">
                           <div class="col-lg-5">
                               <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                               <p>
                                   هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                                   الشكل الخارجي للنص.
                               </p>
                               <a href="#">المزيد</a>
                           </div>
                       </div>
                   </div>
                   <div class="carousel-item carousel-3">
                       <div class="container info">
                           <div class="col-lg-5">
                               <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                               <p>
                                   هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على
                                   الشكل الخارجي.
                               </p>
                               <a href="#">المزيد</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <!--about-->
       <div class="about">
           <div class="container">
               <div class="col-lg-6 text-center">
                   <p>
                       <span>بنك الدم</span> هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن
                       التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة
                       لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ.
                   </p>
               </div>
           </div>
       </div>

       <!--articles-->
       <div class="articles">
           <div class="container title">
               <div class="head-text">
                   <h2>المقالات</h2>
               </div>
           </div>
           <div class="view">
               <div class="container">
                   <div class="row">
                       <!-- Set up your HTML -->
                       <div class="owl-carousel articles-carousel owl-rtl owl-loaded owl-drag">





                           <div class="owl-stage-outer">
                               <div class="owl-stage"style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1917px;">
                                @foreach ($posts as $post)
                                   <div class="owl-item active" style="width: 373.333px; margin-left: 10px;">
                                    
                                       <div class="card">
                                        
                                           <div class="photo">
                                               <img src="{{ $post->image }}" class="card-img-top"
                                                   alt="...">
                                               <a href="article-details.html" class="click">المزيد</a>
                                           </div>
                                           <div    class="favourite" >
                                               <i id='{{ $post->id }}'  onclick='Favourite(this)'  class="far fa-heart"></i>
                                           </div>

    

                                           <div class="card-body">
                                               <h5 class="card-title">{{ $post->title }}</h5>
                                               <p class="card-text">
                                                {{ $post->content }}
                                               </p>
                                           </div>
                                       
                                       </div>
                                      
                                   </div>
                                   @endforeach
                               </div>
                           </div>
                           <div class="owl-nav"><button type="button" role="presentation"
                                   class="owl-prev disabled"><span aria-label="Previous">‹</span></button><button
                                   type="button" role="presentation" class="owl-next"><span
                                       aria-label="Next">›</span></button></div>
                           <div class="owl-dots"><button role="button"
                                   class="owl-dot active"><span></span></button><button role="button"
                                   class="owl-dot"><span></span></button></div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <!--requests-->
       <div class="requests">
           <div class="container">
               <div class="head-text">
                   <h2>طلبات التبرع</h2>
               </div>
           </div>
           <div class="content">
               <div class="container">
                   <form class="row filter" action="{{ route('search') }}"  method="POST">
                    @csrf
                       <div class="col-md-5 blood">
                           <div class="form-group">
                               <div class="inside-select">
                                   <select class="form-control"  name="city_id">
                                    
                                       <option selected="" disabled="">اختر المدينة</option>
                                       @foreach ($cities as $city)
                                       <option  value="{{ $city->id }}" >{{ $city->name }}</option>
                                       @endforeach
                                   </select>
                                   <i class="fas fa-chevron-down"></i>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-5 city">
                           <div class="form-group">
                               <div class="inside-select">
                                   <select class="form-control" name="blood_type_id">
                                    <option selected="" disabled="">اختر فصيلة الدم</option>
                                    
                                       @foreach ($blood_types as $blood_type)
                                           
                                       
                                       <option  value="{{ $blood_type->id }}" >{{ $blood_type->name }}</option>
                                       @endforeach
                                     
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
                               <h2 dir="ltr">{{ $donation_request->bloodType->name }}</h2>
                           </div>
                           <ul>
                               <li><span>اسم الحالة:</span> {{ $donation_request->patient_name }}</li>
                               <li><span>مستشفى:</span>  {{ $donation_request->hospital_name }}</li>
                               <li><span>المدينة:</span>{{ $donation_request->city->name }} </li>
                           </ul>
                           <a href="{{ route('show.donation',$donation_request->id) }}">التفاصيل</a>
                       </div>
                       @empty
                        
                       @endforelse
                   </div>
                   <div class="more">
                       <a href="{{ route('donations') }}">المزيد</a>
                   </div>
               </div>
           </div>
       </div>

       <!--contact-->
       <div class="contact">
           <div class="container">
               <div class="col-md-7">
                   <div class="title">
                       <h3>اتصل بنا</h3>
                   </div>
                   <p class="text">يمكنك الإتصال بنا للإستفسار عن معلومة وسيتم الرد عليكم</p>
                   <div class="row whatsapp">
                       <a href="#">
                           <img src="{{ asset('enduser/imgs/whats.png') }}">
                           <p dir="ltr">+002 1215454551</p>
                       </a>
                   </div>
               </div>
           </div>
       </div>

       <!--app-->
       <div class="app">
           <div class="container">
               <div class="row">
                   <div class="info col-md-6">
                       <h3>تطبيق بنك الدم</h3>
                       <p>
                           هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                       </p>
                       <div class="download">
                           <h4>متوفر على</h4>
                           <div class="row stores">
                               <div class="col-sm-6">
                                   <a href="#">
                                       <img src="{{ asset('enduser/imgs/google.png') }}">
                                   </a>
                               </div>
                               <div class="col-sm-6">
                                   <a href="#">
                                       <img src="{{ asset('enduser/imgs/ios.png') }}">
                                   </a>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="screens col-md-6">
                       <img src="{{ asset('enduser/imgs/App.png') }}">
                   </div>
               </div>
           </div>
       </div>

@push('js')
  <script>


    function Favourite(heart)
    {
       
       // alert('test');
         var post_id = heart.id
         $.ajax({
             url:'{{ url(route('toggle.fav')) }}',
             type:'post',
             data:{_token:"{{ csrf_token() }}",post_id:post_id},
             success: function(data){
//
                 console.log(data);
             }

        });
        // var currentClass = $(heart).attr(class);
        // if(currentClass.includes('first')){

        //     $(heart).removeclass('first-heart').addClass('second-heart');
        // }else{
        //     $(heart).removeclass('second-heart').addClass('first-heart');
        // }
    }

  
</script>

    
@endpush
@endsection
