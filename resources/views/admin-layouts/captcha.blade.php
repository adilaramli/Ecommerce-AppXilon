<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Captcha</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset ('admin-assets/images/icon/favicon.ico')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/slicknav.min.css')}}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{ asset ('admin-assets/css/responsive.css')}}">
    <link href="{{asset('admin-assets/css/suneditor.css" rel="stylesheet')}}">

    <!-- modernizr css -->
    <script src="{{asset('admin-assets/js/suneditor.js')}}"></script>
    <script src="{{asset('admin-assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>
<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        @include("admin-include.sidebar") <!-- sidebar menu -->
        <!-- main content area start -->
        <div class="main-content">
            @include('admin-include.header') <!-- header-->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index2.html">Home</a></li>
                                <li><span>CAPTCHA</span></li>
                            </ul>
                        </div>
                    </div>
                    @include("admin-include.adminbar")
                </div>
            </div>   
                <div class="main-content-inner">
                    <div class="row">
                        <div class="col-lg-12 col-ml-12">
                            <div class="row">
                                <!-- Textual inputs start -->
                                @foreach($capt as $capt)
                                <div class="col-lg-6 mt-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="header-title">Captcha ({{$capt->Name}})</h4>
                                            <p class="text-muted font-14 mb-4">Set options for the captcha used on the front-end</p>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-6">
                                                    <div class="form-row">
                                                        <label class="col-form-label">Enable/Disable</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-4 col-sm-6">
                                                    @if ($capt->Status == '1')
                                                    <label class="switch">
                                                        <input type="checkbox" checked onclick="return false;">
                                                        <span class="slider round"></span>
                                                    </label>
                                                    @else
                                                    <label class="switch">
                                                        <input type="checkbox" onclick="return false;">
                                                        <span class="slider round"></span>
                                                        @endif
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-6">
                                                    <div class="form-row">
                                                        <label class="col-form-label">Choose Pattern</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6">
                                                    <div class="form-row">
                                                        <input data-id="{{$capt->Type}}" class="toggle-class" type="checkbox" 
                                                        data-onstyle="success" data-offstyle="primary"
                                                        data-toggle="toggle" data-on="Character" data-off="Number" {{ $capt->Type ? 'checked' : '' }} disabled>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-6">
                                                    <div class="form-row">
                                                        <label class="col-form-label">Example</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-4 col-sm-6">
                                                    <div class="captcha">
                                                        @switch($capt->Type)
                                                            @case(0)
                                                            <span>{!! captcha_img() !!}</span>
                                                                @break
                                                            @case(1)
                                                            <span>{!! captcha_img() !!}</span>
                                                                @break
                                                            @default
                                                            <span>{!! captcha_img() !!}</span>
                                                        @endswitch
                                                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                                                            &#x21bb;
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mt-5" style="text-align: center;">
                                                <a class="btn btn-primary" href="{{ url('capt-edit/'.$capt->Capt_Id) }}">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- Textual inputs end -->
                            </div>
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
            <li><a data-toggle="tab" href="#settings">Settings</a></li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Added</h4>
                            <span class="time"><i class="ti-time"></i>7 Minutes Ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You missed you Password!</h4>
                            <span class="time"><i class="ti-time"></i>09:20 Am</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Member waiting for you Attention</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You Added Kaji Patha few minutes ago</h4>
                            <span class="time"><i class="ti-time"></i>01 minutes ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Ratul Hamba sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Hello sir , where are you, i am egerly waiting for you.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                </div>
            </div>
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <h4>General Settings</h4>
                    <div class="settings-list">
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch1" />
                                    <label for="switch1">Toggle</label>
                                </div>
                            </div>
                            <p>Keep it 'On' When you want to get all the notification.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show recent activity</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch2" />
                                    <label for="switch2">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show your emails</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch3" />
                                    <label for="switch3">Toggle</label>
                                </div>
                            </div>
                            <p>Show email so that easily find you.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show Task statistics</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch4" />
                                    <label for="switch4">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch5" />
                                    <label for="switch5">Toggle</label>
                                </div>
                            </div>
                            <p>Use checkboxes when looking for yes or no answers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="{{asset('admin-assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{asset('admin-assets/js/popper.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/jquery.slicknav.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" 
    integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous" 
    referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" 
    integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
    <script type="text/javascript">
        $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    
    </script>

    <!-- others plugins -->
    <script src="{{asset('admin-assets/js/plugins.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts.js')}}"></script>
</body>

</html>
