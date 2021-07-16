<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('/front/assets/img/favicon.ico')}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('/front/admin/vendor/bootstrap-datepicker/css/bootstrap-datepicker.css')}}" rel="stylesheet" />
        <link href="{{asset('/front/css/styles.css')}}" rel="stylesheet" />

        <script src="{{asset('front/admin/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('front/admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
     <!--?php
    session_start();
    include('admin/db_connect.php');

	$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach ($query as $key => $value) {
		if(!is_numeric($key))
			$_SESSION['setting_'.$key] = $value;
	}
    ?--> 

    <style>
    	header.masthead {
		  background-image: url("{{asset('uploads/home.jpg')}}");
		  background-repeat: no-repeat;
		  background-size: cover;
		}
        .containerc{
            width: 80%;
            margin: 0 auto;
            padding: 1%;
        }
        .clearfix{
            clear: both;
            float: none;
        }
        .img-responsive{
            width: 100%;
        }
        .img-curve{
            border-radius: 15px;
        }
        .float-text{
            /* position: absolute; */
            margin-top: 30px;
            /* bottom: 20px; */
            /* left: 40%; */
        }
        .box-3{
            width: 28%;
            float: left;
            margin: 2%;
        }
        .categories{
            padding: 4% 0;
        }
        .float-container{
            position: relative;
        }
        .food-menu{
            background-color: #ececec;
            padding: 4% 0;
        }
        .food-menu-box{
            width: 48%;
            margin: 1%;
            padding: 2%;
            float: left;
            background-color:white;
            border-radius: 15px;
        }

        .food-menu-img{
            width: 20%;
            float: left;
        }

        .food-menu-desc{
            width: 70%;
            float: left;
            margin-left: 8%;
        }

        .food-price{
            font-size: 1.1rem;
            margin: 2% 0;
        }
        .food-detail{
            font-size: 1rem;
            color: #747d8c;
        }

    </style>
    <body id="page-top">
        @include('frontend.layout.header')
        @yield('content')
        <div class="modal fade" id="confirm_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Confirmation</h5>
        </div>
        <div class="modal-body">
            <div id="delete_content"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
        </div>
        <!-- <div class="modal fade" id="uni_modal" role='dialog'>
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title"></h5>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
            </div>
        </div> -->
        <div class="modal fade" id="uni_modal_right" role='dialog'>
            <div class="modal-dialog modal-full-height  modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="fa fa-arrow-righ t"></span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            </div>
            </div>
        </div>
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Hotel Mangement system | <a href="https://www.sourcecodester.com/" target="_blank">Sourcecodester</a></div></div>
        </footer>       
       @include('frontend.layout.footer')
    </body>

</html>
