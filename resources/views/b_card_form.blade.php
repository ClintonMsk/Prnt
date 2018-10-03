@extends('Layout/b_layout')
@section("content")
    <div class="card" >

        <div class="card-body">
            <!-- Tab panels -->
            <div class="tab-content card" style="z-index: auto;">
                <div class="md-form"  >
                    <input type="hidden"  value="{{ $folder }}"  class="folder">
                    <input type="hidden"  value="{{ $code }}" class="code">

                    <input type="text" id="title"  class="title_ip">
                    <label for="title" style="color: #878787;" >{{ trans("card.title") }}</label>
                    <div class="alert alert-danger title_ip_check" style="display: none;" role="alert">
                        {{ trans("card.title_check") }}
                    </div>
                </div>
                <div class="md-form">
                    <font  style="color: #878787;" >{{ trans("card.detail") }}</font>
                    <textarea type="text" id="editor1"  class="md-textarea form-control detail_ip rounded-0"  rows="20" style="height: 100px;" ></textarea>
                    <div class="alert alert-danger detail_ip_check" style="display: none;" role="alert">
                        {{ trans("card.detail_check") }}
                    </div>
                </div>
                <div class="md-form">
                    <select class="mdb-select product">
                        <option value="" disabled selected>{{ trans("card.select_product") }}</option>
                        <?PHP
                        foreach ($product as $result) { ?>
                        <option value="{{ $result->type_code }}" >{{ $result->type_title }}</option>
                        <?PHP
                        }
                        ?>

                    </select>
                    <div class="alert alert-danger product_ip_check" style="display: none;"  role="alert">
                        {{ trans("card.select_product_check") }}
                    </div>
                    <div class="md-form" align="center" >
                        <button class="btn btn-warning" data-toggle="modal" onclick="SetCat('product','{{ trans("card.add_product") }}')"  data-target="#ModalG" >{{ trans("card.add_product") }}</button>
                    </div>
                </div>
                <div class="md-form">
                    <select class="mdb-select dimensions">
                        <option value="" disabled selected>{{ trans("card.select_dimension") }}</option>
                        <?PHP
                        foreach ($dimensions as $result) { ?>
                        <option value="{{ $result->type_code }}" >{{ $result->type_title }}</option>
                        <?PHP
                        }
                        ?>
                    </select>
                    <div class="alert alert-danger dimensions_ip_check" style="display: none;"  role="alert">
                        {{ trans("card.select_dimension_check") }}
                    </div>
                    <div class="md-form" align="center" >
                        <button class="btn btn-warning" data-toggle="modal" onclick="SetCat('dimensions','{{ trans("card.add_dimension") }}')"  data-target="#ModalG" >{{ trans("card.add_dimension") }}</button>
                    </div>
                </div>
                <div class="md-form">
                    <select class="mdb-select type_paper">
                        <option value="" disabled selected>{{ trans("card.select_paper") }}</option>
                        <?PHP
                        foreach ($type_paper as $result) { ?>
                        <option value="{{ $result->type_code }}" >{{ $result->type_title }}</option>
                        <?PHP
                        }
                        ?>
                    </select>
                    <div class="alert alert-danger type_paper_check" style="display: none;"  role="alert">
                        {{ trans("card.select_paper_check") }}
                    </div>
                    <div class="md-form" align="center" >
                        <button class="btn btn-warning" data-toggle="modal" onclick="SetCat('type_paper','{{ trans("card.add_paper") }}')"  data-target="#ModalG" >{{ trans("card.add_paper") }}</button>
                    </div>
                </div>
                <div class="md-form">
                    <select class="mdb-select printime">
                        <option value="" disabled selected>{{ trans("card.select_printing") }}</option>
                        <?PHP
                        foreach ($printime as $result) { ?>
                        <option value="{{ $result->type_code }}" >{{ $result->type_title }}</option>
                        <?PHP
                        }
                        ?>
                    </select>
                    <div class="alert alert-danger printime_check" style="display: none;"  role="alert">
                        {{ trans("card.select_printing_check") }}
                    </div>
                    <div class="md-form" align="center" >
                        <button class="btn btn-warning" data-toggle="modal" onclick="SetCat('printime','{{ trans("card.add_printing") }}')"  data-target="#ModalG" >{{ trans("card.add_printing") }}</button>
                    </div>
                    <div class="md-form">
                        <input type="text"  id="price"  class="price_ip">
                        <label for="price" style="color: #878787;" >{{ trans("card.price") }}</label>
                        <div class="alert alert-danger price_ip_check" style="display: none;" role="alert">
                            {{ trans("card.price_check") }}
                        </div>
                    </div>
                </div>
        </div>
        </div>
        <div class="card-body">
            <div class="tab-content card">
                <div class="form-group">
                    <label>{{ trans("card.cover") }}</label>
                    <div class="file-loading">
                        <input id="CoverMain" class="file" type="file"  >
                    </div>
                    <div id="errorBlockCoverMain" class="help-block"></div>
                    <div class="alert alert-danger CoverMain_check" style="display: none;"  role="alert">
                        {{ trans("card.cover_check") }}
                    </div>
                </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="tab-content card">
                <div class="form-group">
                    <label>{{ trans("card.gallery") }}</label>
                    <div class="file-loading">
                        <input id="Gallery" name="file_data" class="file" type="file" multiple accept="image/jpeg,image/jpg" >
                    </div>
                    <div id="errorBlock" class="help-block"></div>
                </div>
                <hr>
                <div class="row" align="center" >
                    <button id="submit_form" class="btn btn-primary ladda-button ladda-progress" data-style="zoom-in" type="button" >{{ trans("tool.submit") }}</button>
                </div>
            </div>

        </div>

    </div>

    <div class="row" >

        <div class="modal fade" id="ModalG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title title_cat" id="exampleModalLabel"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="md-form">
                                <input type="hidden" class="form-control" id="code">
                            </div>
                            <div class="md-form">
                                <div class="form-group">
                                    <input type="hidden" id="type_set" class="type_set"  />
                                    <input type="text" id="materialFormRegisterNameEx"  class="form-control title_group">
                                    <label for="materialFormRegisterNameEx" style="color: #878787;" >{{ trans("card.title") }}</label>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="AddGroup()" class="btn btn-primary">{{ trans("card.add") }}</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans("card.close") }}</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section("script")
<script>

    CkeBasic("editor1");
    ResetForm();



    function SetCat(type,title){
        $("#type_set").val(type);
        $(".title_cat").html(title);
    }


    function ResetForm() {
        $('select.group').material_select();
        $('select.product').material_select();
        $('select.dimensions').material_select();
        $('select.type_paper').material_select();
        $('select.printime').material_select();
    }

    function DestroyForm() {
        $('select.group').material_select("destroy");
        $('select.product').material_select("destroy");
        $('select.dimensions').material_select("destroy");
        $('select.type_paper').material_select("destroy");
        $('select.printime').material_select("destroy");
    }



   // Loadgroup("codsx");
    var progress_load = 0;
    var status = 0;
    $(document).ready(function() {
        'use strict';


    });

    check_bool = false;
    function Check(){

    }

    count = 0;
    $("#submit_form").click(function () {
        CKupdate();
        DestroyForm();
        var count_check = 0;
        var class_name = "";

        if($(".title_ip").val() == ""){
            $(".title_ip_check").fadeIn();
            ResetForm();
        }else{
            count_check++;
            $(".title_ip_check").fadeOut();
        }

        if($(".product").val() == ""){
            $(".product_ip_check").fadeIn();
            ResetForm();
        }else{
            count_check++;
            $(".product_ip_check").fadeOut();
        }



        if($("#CoverMain")[0].files[0] === undefined ){

            $(".CoverMain_check").fadeIn();
        }else{
            count_check++;
            $(".CoverMain_check").fadeOut();
        }

        if(count_check != 3 ){
            //$("html, body").animate({ scrollTop: 0 }, "slow");

            $("#button").click(function() {
                $([document.documentElement, document.body]).animate({
                    scrollTop: $(".printime_check").offset().top
                }, 2000);
            });

            //$('.printime_check').scrollTo(100);

        }else{
            cal_input();
        }


    });


    function CKupdate(){
        for ( instance in CKEDITOR.instances )
            CKEDITOR.instances[instance].updateElement();
    }


    function cal_input() {


        Ladda.bind('.ladda-button:not(.ladda-progress)', {
            timeout: 2000
        });

        Ladda.bind( '#submit_form' );


        Ladda.bind('.ladda-progress', {

            callback: function(instance) {
                var progress = 0;
                var interval = setInterval(function() {
                    progress = Math.min(progress + Math.random() * 0.1, 1);
                    instance.isLoading();
                    instance.setProgress(progress_load);
                    console.log("Progress"+progress_load);
                    if(status === 1){
                        instance.stop();
                        clearInterval(interval);
                    }

                },200);

            }

        });


        form_data = new FormData();

        var folder = $(".folder").val();
        var code = $(".code").val();

        var title = $(".title_ip").val();
        var detail = $(".detail_ip").val();
        var price = $(".price_ip").val();

        var product = $(".product").val();
        var dimensions = $(".dimensions").val();
        var type_paper = $(".type_paper").val();
        var printime = $(".printime").val();

        var Cover = $("#CoverMain")[0].files[0];

        form_data.append("folder",folder);
        form_data.append("code",code);
        form_data.append("title",title);
        form_data.append("detail",detail);
        form_data.append("product",product);
        form_data.append("dimensions",dimensions);
        form_data.append("type_paper",type_paper);
        form_data.append("printime",printime);
        form_data.append("price",price);
        form_data.append("Cover",Cover);

        $.ajax({
            url:url+"/PostCard",
            dataType:'script',
            type:'post',
            data:form_data,
            cache: false,
            contentType: false,
            processData: false,
            cache:false,
            contentType:false,
            processData:false,
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function (data) {
                if(data == 1){
                    toastr.success($(".success_add_text").val(),$(".success_title").val());
                    window.location.reload();

                }else{
                    toastr.error($(".error_add_text").val(),$(".error_title").val());
                }
            },
            error:function (data) {
               // toastr.error("เกิดปัญหาในการเพิ่มข้อมูล","เกิดข้อผิดพลาด");
               // $("#ModalDanger").modal('show');
               // $(".debug_js").html(data.responseText);
                console.log(data);
            }
        });


    }

    function AddGroup() {

        var form_datag = new FormData();
        var titleg = $('.title_group').val();
        var type = $('.type_set').val();
        form_datag.append("title",titleg);
        form_datag.append("type",type);


        if(titleg != ""){
            $.ajax({
                url:url+"/PostGroup",
                dataType:'script',
                type:'post',
                data:form_datag,
                cache: false,
                contentType: false,
                processData: false,
                cache:false,
                contentType:false,
                processData:false,
                type: 'post', headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function (data) {
                    data = JSON.parse(data);
                    console.log(data);
                    if(data["Status"] == "Success" ){
                        toastr.success("เพิ่มข้อมูล "+titleg+" เสร็จสิ้น! ","สำเร็จ");
                        $("select."+type).append('<option value="'+data['Code']+'" selected >'+titleg+'</option>');
                        $("select."+type).material_select();
                        $('#ModalG').modal('hide');
                        $('#ModalG').hide();
                        $('.modal-backdrop').hide();
                        $(".title_group").val("");
                        $('.cat_set').val("");

                    }if(data["Status"] == "Duplicate" ){
                        toastr.warning("มีข้อมูลซ้ำ","การแจ้งเตือน");
                    }
                },
                error:function (data) {
                    toastr.error("เกิดปัญหาในการเพิ่มข้อมูล","เกิดข้อผิดพลาด");
                    $("#ModalDanger").modal('show');
                    $(".debug_js").html(data.responseText);
                }
            });
        }else{
            toastr.warning("กรุณากรอกข้อมูล","การแจ้งเตือน");
        }
    }

    var folder = $(".folder").val();
    var code = $(".code").val();

    $("#Gallery").fileinput({
            showPreview: true,
            allowedFileExtensions: ["jpg"],
            elErrorContainer: "#errorBlock",
            maxFilePreviewSize: 2048,
            maxFileCount: 4,
            language: 'en',
            uploadUrl:url+"/UploadImageCard",
            uploadExtraData: {foldername: folder,codes:code},
            initialPreviewAsData: true,
            showUpload:true,

        });

    $("#CoverMain").fileinput({
        showPreview: true,
        allowedFileExtensions: ["jpg"],
        elErrorContainer: "#errorBlockCoverMain",
        maxFilePreviewSize: 2048,
        language: 'en',
        initialPreviewAsData: true,
        showUpload:false,
        previewClass: "Cover",
        frameClass:"ThumbSet",
        mainClass:"InputSet",

    });




</script>
@endsection
