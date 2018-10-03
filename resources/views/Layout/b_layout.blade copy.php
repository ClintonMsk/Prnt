<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="{{ URL::to('/') }}/Front/img/favicon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ trans('tool.SystemTitle') }}</title>

    <!--Style-->
            {!! H::style('mdbboot/css/style.css') !!}
<!--bootstrapinput-->
            {!! H::style('bootstrapinput/css/fileinput-rtl.css') !!}
            {!! H::style('bootstrapinput/css/fileinput.css') !!}
            {!! H::style('bootstrapinput/themes/explorer/theme.css') !!}
<!--ladda-->
            {!! H::style('ladda/css/demo.css') !!}
            {!! H::style('ladda/dist/ladda.min.css') !!}
<!--Ckeditor-->


<!--Style-->

    <script>
        var url = "<?php echo url(""); ?>";
        var token = "{{ csrf_token() }}";
    </script>

</head>
<body class="fixed-sn mdb-skin-custom"   >
    <header>
        <!-- SideNav slide-out button -->
        <a href="#" data-activates="slide-out" class="btn btn-primary p-3 button-collapse"><i class="fa fa-bars"></i></a>

        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav fixed">
            <ul class="custom-scrollbar">
                <!-- Logo -->
                <li>
                    <div class="logo-wrapper waves-light">
                        <a href="#"><img src="{{ URL::to('/') }}/image/logo.png" class="img-fluid flex-center"></a>
                    </div>
                </li>
                <!--/. Logo -->
                <!--Search Form-->

                <!--/.Search Form-->
                <!-- Side navigation links -->
                <hr style="background:#ffffff;width: 80%;"  >
                <li  >
                    <ul class="collapsible collapsible-accordion">
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-chevron-right"></i>{{ trans("tool.menu1") }}<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{ URL::to('/') }}/BackEnd/AddActivity" class="waves-effect">{{ trans("tool.menu1-1") }}</a>
                                    </li>
                                    <li><a href="{{ URL::to('/') }}/BackEnd/ListActivity/group_date_add/DESC/8/1/null" class="waves-effect">{{ trans("tool.menu1-2") }}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>

                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-chevron-right"></i>{{ trans("tool.menu2") }}<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{ URL::to('/') }}/BackEnd/AddProject" class="waves-effect">{{ trans("tool.menu2-1") }}</a>
                                    </li>
                                    <li><a href="{{ URL::to('/') }}/BackEnd/ListProject/project_date_add/DESC/8/1/null" class="waves-effect">{{ trans("tool.menu2-2") }}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-chevron-right"></i>{{ trans("tool.menu3") }}<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{ URL::to('/') }}/BackEnd/AddMentor" class="waves-effect">{{ trans("tool.menu3-1") }}</a>
                                    </li>
                                    <li><a href="{{ URL::to('/') }}/BackEnd/ListMentor/team_date_add/DESC/8/1/null" class="waves-effect">{{ trans("tool.menu3-2") }}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <!--/. Side navigation links -->
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-chevron-right"></i>{{ trans("tool.menu4") }}<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{ URL::to('/') }}/BackEnd/ListInbox/inbox_date_add/DESC/8/1/null" class="waves-effect">{{ trans("tool.menu4-1") }}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--/. Sidebar navigation -->
        <!-- /.Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <p style="font-weight: 500;font-size: 20px;" >{{ trans('tool.SystemTitle') }}</p>
            </div>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">

            </ul>
            <input type="hidden" value="{{ trans("tool.success_title") }}" class="success_title" />
            <input type="hidden" value="{{ trans("tool.success_detail") }}" class="success_detail" />
            <input type="hidden" value="{{ trans("tool.error_title") }}" class="error_title" />
            <input type="hidden" value="{{ trans("tool.error_detail") }}" class="error_detail" />
        </nav>
        <!-- /.Navbar -->
    </header>

    <main>

        <div class="container-fluid">
            @yield("content")
        </div>
        <style>
            .details-container{
                width:150% !important;
            }
            .left-panel{
                width: 100% !important;
                left: -65% !important;
            }
        </style>
        <div class="modal fade top" id="ModalDanger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="t`rue">
            <div class="modal-dialog modal-notify  modal-danger col-lg-12" role="document">
                <!--Content-->
                <div class="modal-content  container-fluid" style="height:100%;width:90%;overflow: scroll;" >
                    <!--Header-->
                    <div class="modal-header">
                        <p class="heading">Modal Danger</p>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>

                    <!--Body-->
                    <div class="debug_js" >

                    </div>

                    <!--Footer-->
                </div>
                <!--/.Content-->
            </div>
        </div>
    </main>
    @extends('Layout/b_layout_foot')
</body>
</html>