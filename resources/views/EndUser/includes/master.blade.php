<html lang="en" dir="rtl"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
@include('EndUser.includes.head')
    
    <title>Blood Bank</title>
</head>
<body class="{{ $bodyClass ?? '' }}">
    <!--upper-bar-->
   
    @include('enduser.includes.sidebar')

    <!--nav-->
    <div class="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="imgs/logo.png" class="d-inline-block align-top" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">الرئيسية <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">عن بنك الدم</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">المقالات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="donation-requests.html">طلبات التبرع</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="who-are-us.html">من نحن</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact-us.html">اتصل بنا</a>
                        </li>
                    </ul>
                    @guest('enduser')
                        
                   
                    <!--not a member-->
                    <div class="accounts">
                        <a href="{{ route('enduser.register.page') }}" class="create">إنشاء حساب جديد</a>
                        <a href="{{ route('enduser.login.page') }}" class="signin">الدخول</a>
                    </div>
                    @endguest


                    @auth('enduser')
                    <div class="accounts">
                        <form id="logout" method="POST"  action="{{ route('logout.main') }}">
                            @csrf
                            <a href="javascript:void(0)" class="signin" onclick="document.getElementById('logout').submit();">
                                تسجيل خروج
                            </a>
                        </form>
                    </div>
                    @endauth
                    <!--I'm a member

                    <a href="#" class="donate">
                        <img src="imgs/transfusion.svg">
                        <p>طلب تبرع</p>
                    </a>

                    -->
                    
                </div>
            </div>
        </nav>
    </div>
    
   @yield('content')
    
    <!--footer-->
    <div class="footer">
        <div class="inside-footer">
            <div class="container">
                <div class="row">
                    <div class="details col-md-4">
                        <img src="imgs/logo.png">
                        <h4>بنك الدم</h4>
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى.
                        </p>
                    </div>
                    <div class="pages col-md-4">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-home-list" href="index.html" role="tab" aria-controls="home">الرئيسية</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list" href="#" role="tab" aria-controls="profile">عن بنك الدم</a>
                            <a class="list-group-item list-group-item-action" id="list-messages-list" href="#" role="tab" aria-controls="messages">المقالات</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" href="donation-requests.html" role="tab" aria-controls="settings">طلبات التبرع</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" href="who-are-us.html" role="tab" aria-controls="settings">من نحن</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" href="contact-us.html" role="tab" aria-controls="settings">اتصل بنا</a>
                        </div>
                    </div>
                    <div class="stores col-md-4">
                        <div class="availabe">
                            <p>متوفر على</p>
                            <a href="#">
                                <img src="{{ asset('enduser/imgs/google1.png') }}">
                            </a>
                            <a href="#">
                                <img src="{{ asset('enduser/imgs/ios1.png') }}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="other">
            <div class="container">
                <div class="row">
                    <div class="social col-md-4">
                        <div class="icons">
                            <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                    <div class="rights col-md-8">
                        <p>جميع الحقوق محفوظة لـ <span>بنك الدم</span> © 2019</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   @include('EndUser.includes.footer')

</body>
</html>