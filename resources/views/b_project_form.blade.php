@extends('Layout/b_layout')
@section("content")
    <div class="card" >

        <div class="card-body">
            <!-- Tab panels -->
            <div class="tab-content card" style="z-index: auto;">
                <div class="md-form">
                    <input type="hidden" class="foldername" value="{{ $folder }}" />
                    <input type="hidden" class="code" value="{{ $code }}" />
                    <input type="text" id="materialFormRegisterNameEx"  class="form-control title_ip">
                    <label for="materialFormRegisterNameEx" style="color: #878787;" >{{ trans("project.title") }}</label>
                </div>
                    <div class="md-form">
                        <textarea type="text" id="materialFormRegisterNameEx"  class="md-textarea form-control detail_ip rounded-0" rows="10" ></textarea>
                        <label for="materialFormRegisterNameEx" style="color: #878787;" >{{ trans("project.detail") }}</label>
                    </div>
                <div class="md-form">
                    <input type="text" id="materialFormRegisterNameEx"  class="form-control title_slide">
                    <label for="materialFormRegisterNameEx" style="color: #878787;" >{{ trans("project.title_slide") }}</label>
                </div>
                <div class="md-form">
                    <textarea type="text" id="materialFormRegisterNameEx"  class="md-textarea form-control detail_slide rounded-0" rows="10" ></textarea>
                    <label for="materialFormRegisterNameEx" style="color: #878787;" >{{ trans("project.detail_slide") }}</label>
                </div>
        </div>
        </div>

        <div class="card-body">
            <div class="tab-content card">
                <label>{{ trans("project.pdf") }}</label><br>
                <div class="md-form">
                    <select class="mdb-select doc_type" onchange="SetType();"  id="selectBasicHorizontal">
                        <option value="1" >{{ trans("project.type_link") }}</option>
                        <option value="2" >{{ trans("project.type_upload") }}</option>
                    </select>
                </div>
                <div class="md-form input_upload">
                    <div class="file-field">
                        <div class="input-file-container" style="margin-top: -50px;" >
                            <input class="input-file upload_pdf " id="my-file" type="file">
                            <label tabindex="0" for="my-file" class="input-file-trigger ">Select a file...</label>
                        </div>
                    </div>
                </div>
                <div class="md-form input_link">
                    <input type="text" id="materialFormRegisterNameEx"  class="form-control link_ip">
                    <label for="materialFormRegisterNameEx" style="color: #878787;" >{{ trans("project.link") }}</label>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="tab-content card">
                <div class="row">
                    <div class="col-lg-6 col-md-12"><div class="form-group">
                            <label>{{ trans("project.cover_main") }}</label>
                            <div class="file-loading">
                                <input id="CoverMain" class="file" type="file"  >
                            </div>
                            <div id="errorBlockCoverMain" class="help-block"></div>
                        </div></div>
                    <div class="col-lg-6 col-md-12"><div class="form-group">
                            <label>{{ trans("project.cover") }}</label>
                            <div class="file-loading">
                                <input id="Cover" class="file" type="file"  >
                            </div>
                            <div id="errorBlockCover" class="help-block"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12"><div class="form-group">
                            <label>{{ trans("project.cover_bg") }}</label>
                            <div class="file-loading">
                                <input id="CoverBG" class="file" type="file"  >
                            </div>
                            <div id="errorBlockCoverBG" class="help-block"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card-body">
            <div class="tab-content card" >
                <div class="form-group" align="center" >

                </div>
                <div class="row theme_template" style="display: none;" >
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 row_themeform" >
                        <div class="col-4">
                            <div class="thumb_theme" >
                                <img src="" class="img_theme img_theme_set" style="width: 100%;height: 100%;" />
                            </div>

                        </div>
                        <div class="col-7">
                            <div class="md-form">
                                <input type="text" id="materialFormRegisterNameEx"  class="form-control title_theme" />
                                <label for="materialFormRegisterNameEx" style="color: #878787;" >{{ trans("project.title") }}</label>
                            </div>
                            <div class="md-form">
                                <textarea type="text" id="materialFormRegisterNameEx"  class="md-textarea form-control detail_theme rounded-0" rows="10" ></textarea>
                                <label for="materialFormRegisterNameEx" style="color: #878787;" >{{ trans("project.detail") }}</label>
                            </div>
                            <div class="md-form" align="center" >
                                <div class="input-file-container">
                                    <input class="input-file  upload_set" id="my-file" type="file">
                                    <label tabindex="0" for="my-file" class="input-file-trigger ">Select a file...</label>
                                </div>
                            <button  class="btn btn-danger del_theme_set" onclick="DelTheme();" >{{ trans('project.del') }}</button>


                            </div>

                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="form_theme_container row" >

                    </div>




                    <div class="md-form" align="center" >
                        <button class="btn btn-success" style="background: #118f00;" onclick="AddTheme();" >
                            {{ trans('project.add_theme') }}
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>

                </div>

            </div>
        </div>

        <div class="card-body">
            <div class="tab-content card">
                <div class="form-group">
                    <label>{{ trans("activity.gallery") }}</label>
                    <div class="file-loading">
                        <input id="Gallery" name="file_data" class="file" type="file" multiple accept="image/jpeg,image/jpg" >
                    </div>
                    <div id="errorBlockGallery" class="help-block"></div>
                </div>
                <hr>
                <div class="row" align="center" >
                    <button id="submit_form" class="btn btn-primary ladda-button ladda-progress" data-style="zoom-in" type="button" >{{ trans("tool.submit") }}</button>
                </div>
            </div>

        </div>

    </div>

    <div class="row" >


    </div>

@endsection
@section("script")
<script>

    SetType();
    $('select.doc_type').material_select();

    function SetType(){
        $('select.doc_type').material_select('destroy');
        var type = $(".doc_type").val();

        if(type == 1){
            $(".input_link").fadeIn("50");
            $(".input_upload").fadeOut("50");
        }else{
            $(".input_link").fadeOut("50");
            $(".input_upload").fadeIn("50");
        }

        $('select.doc_type').material_select();

    }



    var progress_load = 0;
    var status = 0;
    $(document).ready(function() {
        'use strict';


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

                cal_input(instance);
            }

        });


    });

    count = 0;
    $("#submit_form").click(function (e) {
        'use strict';
    });

    function cal_input(loadpro){

        $(".row_themeform:first").remove();

        var form_data = new FormData();


        $(".upload_set*").each(function(){
            var file = $(this)[0].files[0];
            form_data.append("image_theme[]",file);
        });


        $(".title_theme*").each(function(){
            var value = $(this).val();
            form_data.append("title_theme[]",value);
        });

        $(".detail_theme*").each(function(){
            var value = $(this).val();
            form_data.append("detail_theme[]",value);
        });


        var title = $(".title_ip").val();
        var title_silde = $(".title_slide").val();
        var detail = $(".detail_ip").val();
        var detail_slide = $(".detail_slide").val();
        var folder = $(".foldername").val();
        var code = $(".code").val();
        var url_link = $(".link_ip").val();

        $('select.doc_type').material_select('destroy');

        var CoverMain = $("#CoverMain")[0].files[0];
        var Cover = $("#Cover")[0].files[0];
        var CoverBG = $("#CoverBG")[0].files[0];
        var PDF = $(".upload_pdf")[0].files[0];
        var type = $(".doc_type").val();


        /*Text*/
        form_data.append("title",title);
        form_data.append("title_silde",title_silde);
        form_data.append("detail",detail);
        form_data.append("detail_slide",detail_slide);
        form_data.append("detail",detail);
        form_data.append("folder",folder);
        form_data.append("code",code);
        form_data.append("type",type);
        form_data.append("url",url_link);
        /*Text*/


        /*File*/
        form_data.append("CoverMain",CoverMain);
        form_data.append("Cover",Cover);
        form_data.append("CoverBG",CoverBG);
        form_data.append("PDF",PDF);
        /*File*/











        $.ajax({
            url:url+"/../PostProject",
            dataType:'script',
            type:'post',
            data:form_data,
            cache: false,
            contentType: false,
            processData: false,
            xhr:function(){
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) {
                    myXhr.upload.addEventListener('progress', progress, false);
                    console.log(myXhr.upload);

                    myXhr.addEventListener("progress",function(pro){

                        console.log("Progress"+pro.loaded);


                    });

                }
                return myXhr;
            },
            cache:false,
            contentType:false,
            processData:false,
            type: 'post', headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success:function (data) {
                console.log(data);
                if(data == 1 ){
                    toastr.success($(".success_title").val(),$(".success_detail").val());
                    loadpro.stop();
                    window.location.reload();
                }else {

                }

            },
            error:function (data) {
                console.log(data);
                toastr.error($(".error_title").val(),$(".error_detail").val());
                $("#ModalDanger").modal('show');
                $(".debug_js").html(data.responseText);
            }


        });

    }


    function progress(e){

        if(e.lengthComputable){
            var max = e.total;
            var current = e.loaded;
            var Percentage = current/max;
            console.log("Current:"+Percentage);
            progress_load = Percentage;
            if(Percentage >= 100)
            {

            }
        }
    }


    var folder = $(".foldername").val();
    var code = $(".code").val();


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
    $("#Cover").fileinput({
        showPreview: true,
        allowedFileExtensions: ["jpg"],
        elErrorContainer: "#errorBlockCover",
        maxFilePreviewSize: 2048,
        language: 'en',
        initialPreviewAsData: true,
        showUpload:false,
        previewClass: "Cover",
        frameClass:"ThumbSet",
        mainClass:"InputSet",


    });
    $("#CoverBG").fileinput({
        showPreview: true,
        allowedFileExtensions: ["jpg"],
        elErrorContainer: "#errorBlockCoverBG",
        maxFilePreviewSize: 2048,
        language: 'en',
        initialPreviewAsData: true,
        showUpload:false,
        previewClass: "CoverBG",
        frameClass:"ThumbSetBG",
        mainClass:"InputSetBG",


    });


    $("#Gallery").fileinput({
            showPreview: true,
            allowedFileExtensions: ["jpg"],
            elErrorContainer: "#errorBlockGallery",
            maxFilePreviewSize: 2048,
            maxFileCount: 40,
            language: 'en',
            uploadUrl:url+"/UploadImageProject",
            uploadExtraData: {foldername: folder,codes:code},
            initialPreviewAsData: true,
            showUpload:true,

        });






</script>
@endsection
