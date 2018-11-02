@php

    if((request()->session()->get('code_employee') !== null ) ){
                    return redirect('/');
            }
@endphp
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>เข้าสู่ระบบ</title>

{!! H::style('mdbbootf/css/style.css') !!}
{!! H::style('mdbbootf/css/nprogress.css') !!}

<!--bootstrapinput-->
{!! H::style('bootstrapinput/css/fileinput-rtl.css') !!}
{!! H::style('bootstrapinput/css/fileinput.css') !!}
{!! H::style('bootstrapinput/themes/explorer/theme.css') !!}
<!--ladda-->

    <script>
        var url = "<?php echo url(""); ?>";
        var token = "{{ csrf_token() }}";
    </script>
    <style>

    </style>
</head>
<body class="fixed-sn particles particles-js"  style="background:#0b5fa4" >
<!--Double navigation-->
<div class="container" style="margin: 0 auto;" >
    <div class="col-lg-6 col-sm-6 col-md-6 offset-md-3">
        <div align="center" >
            <div class="card" style="padding-bottom: 5% !important;%;margin-top: 10%;width: 100%;padding: 10%;padding-left:5%;padding-right:5%;" >
                <img class="img-fluid" src="{{ URL::to('/') }}/image/logo.png" style="height: 150px !important;" alt="">
                <div class="form-group">
                    <div class="md-form">
                        <input type="text" name="username" id="username"  class="form-control title_ip">
                        <label for="title" style="color: #878787;" >{{ trans("tool.username") }}</label>
                    </div>
                    <div class="md-form">
                        <input type="password" name="password" id="password"  class="form-control title_ip">
                        <label for="title" style="color: #878787;" >{{ trans("tool.password") }}</label>
                    </div>
                    <div class="col-lg-12 p-t-20">
                        <div class="group" align="center" >
                            <button type="button" onclick="Login()" class="btn btn-primary" >เข้าสู่ระบบ</button>
                            <button type="reset" class="btn btn-danger" >ยกเลิก</button><br><br>
                            <span class="help-block fail_login" style="color: #d50000;display: none;font-size: 20px;" >ไม่พบชื่อผู้ใช้ในระบบ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

</body>
{!! H::script('mdbboot/js/jquery.js') !!}
{!! H::script('mdbboot/js/jquery-3.3.1.js') !!}
{!! H::script('mdbboot/js/bootstrap.js') !!}
{!! H::script('mdbboot/js/mdb.js') !!}
{!! H::script('mdbboot/js/compiled.js') !!}
{!! H::script('mdbboot/js/Popper.js') !!}
{!! H::script('mdbboot/js/js_head.js') !!}
{!! H::script('cke/ckeditor.js') !!}


{!! H::script('bootstrapinput/js/fileinput.js') !!}
{!! H::script('bootstrapinput/js/locales/LANG.js') !!}
{!! H::script('bootstrapinput/js/locales/th.js') !!}
{!! H::script('bootstrapinput/js/plugins/piexif.js') !!}
{!! H::script('bootstrapinput/js/plugins/purify.js') !!}
{!! H::script('bootstrapinput/js/plugins/sortable.js') !!}







{!! H::script('ladda/js/spin.js') !!}
{!! H::script('ladda/js/ladda.js') !!}



<script>

    function Login() {
        var username = $("#username").val();
        var password = $("#password").val();


        var form_data = new FormData();

        form_data.append("username",username);
        form_data.append("password",password);




        $.ajax({
            url:url+"/Login",
            dataType:'json',
            data:form_data,
            cache: false,
            contentType: false,
            processData: false,
            type: 'post', headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success:function (data) {

                if(data.status == "success"){
                    window.location=url+"/BackEnd";
                }else{
                    $(".fail_login").fadeIn();
                }

            },
            error:function (data) {
                console.log(data);
            }


        });
    }
</script>