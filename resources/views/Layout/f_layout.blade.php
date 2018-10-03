<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="{{ URL::to('/') }}/Front/img/favicon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Font Awesome -->

    <title>{{ trans("tool.SystemTitleName") }}</title>
    <!-- You can use open graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
    <?PHP
    if($code != false){
        $url_set = "http://card.commsk.com/Detail/.$code.";
    }else{
        $url_set = "http://card.commsk.com/";
    }
    ?>
    <meta property="og:url"           content="{{ $url_set }}" />
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="{{ $title }}" />
    <meta property="og:description"   content="{{ $description }}" />
    <meta property="og:image"         content="{{ URL::to('/') }}{{ $image }}" />
    <meta data-react-helmet="true" property="fb:app_id" content="2143349125936706"/>
    <meta data-react-helmet="true" name="description" content="{{ $description }}"/>
    <meta data-react-helmet="true" name="keywords" content="การ์ดงานแต่ง,การ์ดงานบวช,การ์ดงานศพ,การ์ดพิธี,ราคาถูก,สมุทรสาคร"/>
    <meta data-react-helmet="true" property="og:title" content="{{ $title }}"/>
    <meta data-react-helmet="true" property="og:description" content="{{ $description }}"/>
    <meta data-react-helmet="true" property="og:url" content="{{ $url_set }}"/>
    <meta data-react-helmet="true" property="og:image" content="{{ URL::to('/') }}{{ $image }}"/>
    <meta data-react-helmet="true" property="og:type" content="article"/>
    <meta data-react-helmet="true" property="og:site_name" content="http://card.commsk.com/"/>
    <meta data-react-helmet="true" name="twitter:site" content="@Skncardshop"/>
    <meta data-react-helmet="true" name="twitter:card" content="summary_large_image"/>
    <meta data-react-helmet="true" name="twitter:domain" content="{{ $url_set }}"/>
    <meta data-react-helmet="true" name="twitter:image" content="{{ URL::to('/') }}{{ $image }}"/>

    {!! H::style('mdbbootf/css/style.css') !!}
    {!! H::style('mdbbootf/css/nprogress.css') !!}

    <!--bootstrapinput-->
    {!! H::style('bootstrapinput/css/fileinput-rtl.css') !!}
    {!! H::style('bootstrapinput/css/fileinput.css') !!}
    {!! H::style('bootstrapinput/themes/explorer/theme.css') !!}
    <!--ladda-->
    {!! H::style('ladda/css/demo.css') !!}
    {!! H::style('ladda/dist/ladda.min.css') !!}
    {!! H::style('slide/css/lightslider.css') !!}
    {!! H::style('fancybox/jquery.fancybox.css') !!}


</head>

<script>
    var url = "<?php echo url(""); ?>";
    var token = "{{ csrf_token() }}";
</script>
<style>
    .progress {
        display: block;
        text-align: center;
        width: 0;
        height: 3px;
        background: red;
        transition: width .3s;
    }
    .progress.hide {
        opacity: 0;
        transition: opacity 1.3s;
    }
    .modal_detail
    {
        position: fixed;
        top:0;
        bottom: 0;
        left:0;
        right:0;
        z-index: 3000;
        background: rgba(0, 0, 0, 0.66);
        display: none;
    }
    .img_detail{
        border-radius: 5px;
        width: 100%;
    }
    .head{
        color: #7e4615;
        font-size: 4vh;
    }

    p,font{
        line-height: 1.5 !important;
        font-size: 2.5vh;
        color: #7e4615;
    }

    @media only screen and (max-width: 1024px) {
        p,font{
            line-height: 1.5!important;
            font-size: 2.2vh !important;
            color: #7e4615;
        }
    }
    @media only screen and (max-width:767px) and (min-width:300px) {
        p,font{
            line-height: 1.5!important;
            font-size:1.7vh !important;
            color: #7e4615;
        }
    }



</style>
<body>
<div class="modal_detail">
    <div class="row" align="center" >
        <h1 class="head" >TEXT</h1>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <img class="img_detail"  src="{{ URL::to('/') }}/image/item1.jpg" alt="">
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <p>
                มีหลักฐานที่เป็นข้อเท็จจริงยืนยันมานานแล้ว ว่าเนื้อหาที่อ่านรู้เรื่องนั้นจะไปกวนสมาธิของคนอ่านให้เขวไปจากส่วนที้เป็น Layout เรานำ Lorem Ipsum มาใช้เพราะความที่มันมีการกระจายของตัวอักษรธรรมดาๆ แบบพอประมาณ ซึ่งเอามาใช้แทนการเขียนว่า ‘ตรงนี้เป็นเนื้อหา, ตรงนี้เป็นเนื้อหา' ได้ และยังทำให้
            </p>
            <table class="table_data" >
                <tr>
                    <td>{{ trans("card.group") }}</td>
                    <td>xx</td>
                </tr>
                <tr>
                    <td>{{ trans("card.product") }}</td>
                    <td>xx</td>
                </tr>
                <tr>
                    <td>{{ trans("card.dimension") }}</td>
                    <td>xx</td>
                </tr>
                <tr>
                    <td>{{ trans("card.paper") }}</td>
                    <td>xx</td>
                </tr>
                <tr>
                    <td>{{ trans("card.time") }}</td>
                    <td>xx</td>
                </tr>
                <tr>
                    <td>{{ trans("card.price") }}</td>
                    <td>xx</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<span class='nprogress-logo fade out'></span>
<div class="load_scene" style="width:100%;height:10vmin;position: fixed;background: #0b51c5;z-index: 100000;bottom: 0;display: none;" >
</div>
<input type="hidden" class="page_set" value="{{ $page }}"  >
<input type="hidden" class="set_page" value="{{ $pages }}" >
<input type="hidden" class="load_detail" value="{{ $load_detail }}" >
<input type="hidden" class="code_detail" value="{{ $code }}" >




<div class="container-fluid">
<header style="height: 0px;" >

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark nav_color " style="z-index: 2500;" >

        <div class="container">

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" onclick="Navbar('nav_set')" >
                <img src="{{ URL::to('/') }}/image/menu.png" height="40" alt="">
            </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse justify-content-center font-weight-bold nav_set" >

                <!-- Links -->
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link " style="margin-right:25px;"  onclick="Setpage('HomePageSet','../Home')"  >{{ trans('tool_front.menu1') }}</a>
                        <span style="width: 60px;" ></span>
                    </li>
                    <li class="nav-item dropdown" >
                        <a class="nav-link"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >{{ trans('tool_front.menu2') }}</a>
                        <span style="width: 120px;" ></span>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?PHP
                            $data =  \App\Query::selectDataCon("print_type","type_main_title","product","=");
                            foreach ($data as $result){
                                $code = $result->type_code;
                                if ($result->type_title !=  'ของชำร่วย' ){
                            ?>
                            <a onclick="Setpage('ListPageSet/{{ $result->type_title }}/{{ trans("card.order_date") }}/{{ trans("card.sort_asc") }}/1000/1/','../List/{{ $result->type_title }}/{{ trans("card.order_date") }}/{{ trans("card.sort_asc") }}/1000/1/')" class="dropdown-item" >{{ $result->type_title }}</a>
                            <?PHP
                            }}
                            ?>
                        </div>
                    </li>

                </ul>
                <!-- Links -->

                <!-- Navbar brand -->
                <a  class="navbar-brand px-lg-4 mr-0  brand_set" href="#">
                    <img src="{{ URL::to('/') }}/image/logo.png" height="110" alt="">
                </a>

                <!-- Links -->
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a onclick="Setpage('ListPageSet/{{ trans('tool_front.menu5') }}/{{ trans("card.order_date") }}/{{ trans("card.sort_asc") }}/1000/1/','../List/{{ trans('tool_front.menu5') }}/{{ trans("card.order_date") }}/{{ trans("card.sort_asc") }}/1000/1/')"  class="nav-link" style="margin-right:25px;" >{{ trans('tool_front.menu5') }}</a>
                        <span style="width: 110px;" ></span>
                    </li>
                    <li class="nav-item ">
                        <a onclick="Setpage('EnvelopePageSet','Envelope')" class="nav-link" style="margin-right:25px;" >{{ trans('tool_front.menu4') }}</a>
                        <span style="width: 110px;" ></span>
                    </li>
                    <li class="nav-item ">
                        <a onclick="Setpage('AboutPageSet','About')" class="nav-link" >{{ trans('tool_front.menu4') }}</a>
                        <span style="width: 94px;" ></span>
                    </li>
                </ul>
                <!-- Links -->

            </div>
    </nav>
    <!-- Navbar -->

    @yield("head")
    <!-- Full Page Intro -->

    <!-- Full Page Intro -->

</header>

<!--Main layout-->
<main class="main_layout" >
    @yield("content")
</main>

@extends('Layout/f_layout_foot')
<!--Main layout-->
</div>
</body>

</html>