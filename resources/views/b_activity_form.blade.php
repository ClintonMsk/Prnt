@extends('Layout/b_layout')
@section("content")
    <div class="card" >

        <div class="card-body">
            <div class="tab-content card">
                <div class="md-form">
                    <input type="hidden" class="foldername" value="{{ $folder }}" />
                    <input type="hidden" class="code" value="{{ $code }}" />
                    <select class="mdb-select category_ip"  id="selectBasicHorizontal">
                        <option value="">{{ trans("place.category") }}</option>
                    </select>
                </div>
                <div class="md-form" align="center" >
                    <button class="btn btn-warning" data-toggle="modal" data-target="#ModalG" >AddGroup</button>
                </div>

                <div class="md-form">
                    <select class="mdb-select week_ip"  id="selectBasicHorizontal">
                        <?PHP
                        for ($i = 1 ; $i <= 10 ; $i++){
                        ?>
                        <option value="{{ $i }}">{{ trans("activity.Week") }} : {{ $i }}</option>
                        <?PHP
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="card-body">
            <!-- Tab panels -->
            <div class="tab-content card" style="z-index: auto;">
                <div class="md-form">
                    <input type="text" id="title"  class="form-control title_ip">
                    <label for="title" style="color: #878787;" >{{ trans("activity.title") }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="instructor"  class="form-control instructor_ip">
                    <label for="instructor" style="color: #878787;" >{{ trans("activity.instructor") }}</label>
                </div>
                    <div class="md-form">
                        <font  style="color: #878787;" >{{ trans("activity.detail") }}</font>
                        <textarea type="text" id="editor"  class="md-textarea form-control detail_ip rounded-0"  rows="20" style="height: 100px;" ></textarea>

                    </div>
                <div class="md-form">
                    <input type="text" id="materail"  class="form-control materail">
                    <label for="materail" style="color: #878787;" >{{ trans("activity.materail") }}</label>
                </div>
                <div class="md-form">
                    <input type="text" id="vdo_ip"  class="form-control vdo_ip">
                    <label for="vdo_ip" style="color: #878787;" >{{ trans("activity.VDO") }}</label>
                </div>
        </div>
        </div>

        <div class="card-body">
            <div class="tab-content card" >
                <div class="form-group" align="center" >
                    <label>{{ trans("activity.vdo") }}</label><br>
                    <video style="width: 90%;" controls id="preview" >
                        <source src="" type="video/mp4">
                    </video>
                </div>
                <div class="md-form">
                    <select class="mdb-select video_type" onchange="SetType();"  id="selectBasicHorizontal">
                        <option value="1" >{{ trans("activity.type_link") }}</option>
                        <option value="2" >{{ trans("activity.type_upload") }}</option>
                    </select>
                </div>
                <div class="md-form input_vdo">
                    <div class="file-field">
                        <div class="btn btn-primary btn-sm float-left">
                            <span>{{ trans("activity.link") }}</span>
                            <input type="file" class="upload_vdo" >
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload your file">
                        </div>
                    </div>
                </div>
                <div class="md-form input_link">
                    <input type="text" id="materialFormRegisterNameEx"  class="form-control link_ip">
                    <label for="materialFormRegisterNameEx" style="color: #878787;" >{{ trans("activity.link") }}</label>
                </div>
                <div class="md-form" align="center" >
                <button class="btn btn-warning" onclick="PreviewVideo();" >{{ trans('activity.preview') }}</button>
                </div>

                <hr>
            </div>
        </div>

        <div class="card-body">
            <div class="tab-content card">
                <div class="form-group">
                    <label>{{ trans("activity.gallery") }}</label>
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
                        <h4 class="modal-title" id="exampleModalLabel">{{ trans("activity.add_group") }}</h4>
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
                                    <input type="text" id="materialFormRegisterNameEx"  class="form-control title_group">
                                    <label for="materialFormRegisterNameEx" style="color: #878787;" >{{ trans("activity.title") }}</label>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="AddGroup()" class="btn btn-primary">{{ trans("activity.add") }}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans("activity.close") }}</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section("script")
<script>

    var myEditor;

    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            console.log( editor );
            myEditor = editor;

        } )
        .catch( error => {
            console.error( error );
        } );


    $('select.week_ip').material_select();
    function PreviewVideo(){
        $('select.video_type').material_select('destroy');
        var type = $(".video_type").val();
        $('select.video_type').material_select();

        if(type == 1){
            var link = $(".link_ip").val();
            alert(link);
            $("#preview").attr("src", link);

        }else{

            var file = $(".upload_vdo")[0].files[0];




            console.log(file);

            var file_url = URL.createObjectURL(file);
            $("#preview").attr("src", file_url);



        }

    }


    SetType();
    $('select.video_type').material_select();
    function SetType(){
        $('select.video_type').material_select('destroy');
        var type = $(".video_type").val();

        if(type == 1){
            $(".input_link").fadeIn("50");
            $(".input_vdo").fadeOut("50");
        }else{
            $(".input_link").fadeOut("50");
            $(".input_vdo").fadeIn("50");
        }

        $('select.video_type').material_select();

    }


    $(".link_ip").keypress(function(){
        alert("OK");
    });


    Loadgroup("codsx");
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



        var form_data = new FormData();

        var title = $(".title_ip").val();
        var detail = myEditor.getData();

        var instructor = $(".instructor_ip").val();
        var folder = $(".foldername").val();
        var code = $(".code").val();

        $('select.category_ip').material_select('destroy');
        var category = $(".category_ip").val();
        $('select.video_type').material_select('destroy');
        $('select.week_ip').material_select('destroy');
        var week = $(".week_ip").val();
        var type = $(".video_type").val();
        var file = $(".upload_vdo")[0].files[0];
        var link = $(".link_ip").val();
        var vdolink = $(".vdo_ip").val();
        var materail = $(".materail").val();

        form_data.append("title",title);
        form_data.append("detail",detail);
        form_data.append("instructor",instructor);
        form_data.append("category",category);
        form_data.append("folder",folder);
        form_data.append("code",code);
        form_data.append("type",type);
        form_data.append("file",file);
        form_data.append("link",link);
        form_data.append("week",week);
        form_data.append("vdolink",vdolink);
        form_data.append("materail",materail);










        $.ajax({
            url:url+"/../PostActivity",
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




    function Loadgroup(group) {


        var form_datag = new FormData();
        form_datag.append("group",group);

        $.ajax({
            url:url+"/GetGroup",
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
                console.log(data);
                $("select.category_ip").html(data);
                $('select.category_ip').material_select();

            },
            error:function (data) {
                toastr.error($(".error_title").val(),$(".error_detail").val());
                $("#ModalDanger").modal('show');
                $(".debug_js").html(data.responseText);
            }


        });

    }
    
    function AddGroup() {

        var form_datag = new FormData();
        var titleg = $('.title_group').val();
        form_datag.append("title",titleg);

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
                        toastr.success($(".success_title").val(),$(".success_detail").val());
                        $('#ModalG').modal('hide');
                        $('#ModalG').hide();
                        $('.modal-backdrop').hide();
                        $(".title_group").val("");
                        Loadgroup(data["Code"]);
                    }else {
                    }
                },
                error:function (data) {
                    toastr.error($(".error_title").val(),$(".error_detail").val());
                    $("#ModalDanger").modal('show');
                    $(".debug_js").html(data.responseText);
                }
            });
        }else{
            toastr.warning($(".success_title").val(),$(".success_detail").val());
        }
    }

    var folder = $(".foldername").val();
    var code = $(".code").val();

    $("#Gallery").fileinput({
            showPreview: true,
            allowedFileExtensions: ["jpg"],
            elErrorContainer: "#errorBlock",
            maxFilePreviewSize: 2048,
            maxFileCount: 40,
            language: 'en',
            uploadUrl:url+"/UploadImageActivity",
            uploadExtraData: {foldername: folder,codes:code},
            initialPreviewAsData: true,
            showUpload:true,

        });
    $("#Document").fileinput({
        showPreview: true,
        previewFileType: "text",
        allowedFileExtensions: ["doc","xls","ppt","pdf","txt","docx","xlsx","pptx"],
        elErrorContainer: "#errorBlock",
        maxFilePreviewSize: 2048,
        maxFileCount: 40,
        language: 'en',
        uploadUrl:url+"/UploadDocument",
        uploadExtraData: {foldername: folder,codes:code},
        initialPreviewAsData: true,
        showUpload:true,
        previewFileIconSettings: {
            'doc': '<i class="fa fa-file-word-o text-primary"></i>',
            'doc': '<i class="fa fa-file-word-o text-primary"></i>',
            'xls': '<i class="fa fa-file-excel-o text-success"></i>',
            'ppt': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
            'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
            'txt': '<i class="fa fa-file-text-o text-info"></i>',
        },
        previewFileExtSettings: {
            'doc': function(ext) {
                return ext.match(/(doc|docx)$/i);
            },
            'xls': function(ext) {
                return ext.match(/(xls|xlsx)$/i);
            },
            'ppt': function(ext) {
                return ext.match(/(ppt|pptx)$/i);
            },
        }

    });






</script>
@endsection
