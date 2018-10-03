
/*Manage Page*/


var set = false;
function Navbar(class_name) {
    if(set == false){
       $("."+class_name).animate({
           height: "toggle"
       }, 500,"easeInOutCirc",function() {
           // Animation complete.
       });
        set = true;
    }else{
        $("."+class_name).animate({
            height: "toggle"
        }, 100, function() {
            // Animation complete.
        });
        set = false;
    }

}



function SetpageModal(pageset){



    NProgress.start();
    $.ajax({
        url:url+"/DetailPageSet/"+pageset,
        dataType:'script',
        cache: false,
        contentType: true,
        processData: true,
        type: 'GET', headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:sucessAjaxModal,
        error:errorAjax,
    });

    function Progress(){
        console.log("OK");
    }


}

function sucessAjaxModal(data) {
    NProgress.done();
    $(".modal_detail").fadeIn("1000");
    $(".modal_detail").html(data);
}


function Setpage(pageset,pagenew){

    if(typeof pageset !== 'undefined' && typeof pageset !== 'undefined'){
        var page = pageset;
        var setpage = pagenew;
        window.history.pushState('page2', 'Title',url+"/"+pagenew);
    }else{
        var page = $(".page_set").val();
        var setpage = $(".set_page").val();
        //window.history.pushState('page2', 'Title',setpage);
    }


    NProgress.start();
   // $(".main_layout").fadeOut();
    $.ajax({
        url:url+"/"+page,
        dataType:'script',
        cache: false,
        contentType: true,
        processData: true,
        type: 'GET', headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:sucessAjax,
        error:errorAjax,
    });

    function Progress(){
    console.log("OK");
    }


}

function Setpages(pageset,pagenew){

    if(typeof pageset !== 'undefined' && typeof pageset !== 'undefined'){
        var page = pageset;
        var setpage = pagenew;
        window.history.pushState('page2', 'Title',url+"/"+pagenew);
    }else{
        var page = $(".page_set").val();
        var setpage = $(".set_page").val();
        //window.history.pushState('page2', 'Title',setpage);
    }

    NProgress.start();
    $.ajax({
        url:url+"/"+page,
        dataType:'script',
        cache: false,
        contentType: true,
        processData: true,
        type: 'GET', headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:sucessAjaxs,
        error:errorAjax,
    });

    function Progress(){
    console.log("OK");
    }


}

function sucessAjax(data) {
    NProgress.done();
   // $(".main_layout").fadeIn();
    $(".main_layout").html(data);
}

function sucessAjaxs(data) {
    NProgress.done();
    $(".content_list").html(data);
}

function errorAjax() {

}

/*Manage Page*/








var click = false ;


function Gentext(amount){
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < amount; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}


function AddTheme(){

  var code = Gentext(20);
    $(".row_themeform:first").attr("id","row_"+code);
    $(".img_theme:first").addClass("img_"+code);
    $(".upload_set:first").attr("onchange","PreviewImage(this,'"+code+"')");


    $(".del_theme_set:first").attr("onclick","DelTheme('"+code+"')");
    var data = $(".theme_template").html();
    $(".form_theme_container").append(data);
    $(".row_themeform:first").attr("id","row_");
    $(".img_theme:first").removeClass("img_"+code);



}

function DelTheme(code) {
   $("#row_"+code).fadeOut(500,function(){
       $("#row_"+code).remove();
    });

}

function PreviewImage(input,code) {

    var file = input.files[0];
    var file_url = URL.createObjectURL(file);
    //alert("URL"+file_url+"Code"+code);
    $(".img_"+code).attr("src",file_url);
}




function show_error_dialog(){
    $('.status').show();
    $('.error_box').show();
}

function hide_error_dialog(){
    $('.status').hide();
    $('.error_box').hide();
}
function show_succes_dialog(){
    $('.status').show();
    $('.success_box').show();
}

function hide_succes_dialog(){
    $('.status').hide();
    $('.popupbox').hide();
}

function Test() {
    $('.status').show();
    $('.error_box').show();
}


$('.dropdown-toggle').dropdown();

function Gotopage(Key) {
    var sort = $("#sortby").val();
    var order = $("#orderby").val();
    var limit = $("#limit").val();
    var search = $("#search").val();
    var page = $("#page").val();



   if(search != "" ){
        window.location = (url + "/"+Key+"/" + sort + "/" + order + "/" + limit + "/" + page + "/"+search);
    }
    else{
        window.location = (url + "/"+Key+"/" + sort + "/" + order + "/" + limit + "/" + page + "/null");
    }

}
function Gotopages(Key,Key2) {
    var sort = $("#orderby").val();
    var order = $("#sortby").val();
    var limit = $("#limit").val();
    var search = $("#search").val();
    var page = $("#page").val();
    $('.mdb-select').material_select("destroy");
    $('.mdb-select').material_select("");
    Setpages(Key+"/"+order+"/"+sort+"/"+limit+"/"+page+"/"+search,Key2+"/"+order+"/"+sort+"/"+limit+"/"+page+"/"+search);


}


function ChartMarker(code,codedata,type,start,end) {




    // Visitors Analytics
    // --------------------------------------------------





        function onDataReceived(data) {

            console.log(data);

            ghrap = [];
            dataraw = [];
            max = 0;


            console.log(dataraw);

            if(type == "today"){
                Morris.Bar({
                    element:code,
                    data:data,
                    xkey: 'datetime',
                    ykeys: ['value'],
                    animate:true,
                    labels: ['จำนวนการส่อง'],
                });
            }


            if(type == "year"){
                Morris.Bar({
                    element:code,
                    data:data,
                    xkey: 'month',
                    ykeys: ['value'],
                    animate:true,
                    labels: ['จำนวนการส่อง'],
                });
            }


            if(type == "custom"){
                Morris.Bar({
                    element:code,
                    data:data,
                    xkey: 'day',
                    xLabelAngle:60,
                    ykeys: ['value'],
                    animate:true,
                    labels: ['จำนวนการส่อง'],
                });
            }







        }
        
        
        function errorData(data) {
            
        }

        $.ajax({
            url: url+"/Service/"+codedata+"/"+type+"/"+start+"/"+end,
            type: "GET",
            dataType: "json",
            success: onDataReceived,
            error:errorData,
        });


}

function Dropdownbtn(list) {

    if(click == false){
        $("."+list).fadeIn();
        click = true;
    }else{
        $("."+list).fadeOut();
        click = false;
    }
}


function DateSet(code,codemarker) {

        var code_set = code;
    $('.dateragepickers_'+code).daterangepicker({
        opens: 'left',
        startDate: moment(),
        endDate: moment(),
    }, function (start, end, label) {
        $('.dateragepickers_'+code+' span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
            'MMMM D, YYYY'));

        $("#Chart_"+code).html("");
        if(start.format('MMMM D, YYYY') == end.format('MMMM D, YYYY')){
            ChartMarker("Chart_"+code,codemarker,"today","null","null");
        }else{
            ChartMarker("Chart_"+code,codemarker,"custom",start.format('YYYY-MM-D'),end.format('YYYY-MM-D'));
        }

    });
    $('.dateragepickers_'+code+' span').html(moment().format('MMMM D, YYYY') + ' - ' +
        moment().format('MMMM D, YYYY'));


    $('<div class=\'flotTip\'></div>').appendTo('body').css({
        'position': 'absolute',
        'display': 'none'
    });


    $('.dateragepicker_'+code).daterangepicker({
        ranges: {
            'วันนี้': [moment(), moment()],
            '7 วันที่แล้ว': [moment().subtract('days',7), moment()],
            '30 วันที่แล้ว': [moment().subtract('days', 29), moment()]
        },
        opens: 'left',
        startDate: moment(),
        endDate: moment(),
        buttonClasses: 'btn',
        applyClass: 'btn-success mr-1',
        cancelClass: 'btn-secondary',
        showCustomRangeLabel: false,
    }, function (start, end, label) {

        $('.dateragepicker_'+code+' span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
            'MMMM D, YYYY'));
        //alert(start.format('YYYY-MM-D')+" "+code_set);
        $("#Chart_"+code).html("");
        //ChartMarker("Chart_"+code,code,"custom",start.format('YYYY-MM-D'),end.format('YYYY-MM-D'));

        if(start.format('MMMM D, YYYY') == end.format('MMMM D, YYYY')){
            ChartMarker("Chart_"+code,codemarker,"today","null","null");
        }else{
            ChartMarker("Chart_"+code,codemarker,"custom",start.format('YYYY-MM-D'),end.format('YYYY-MM-D'));
        }

       /* if(start == end){
            ChartMarker("Chart_"+code,code,"today","null","null");
        }else{
            ChartMarker("Chart_"+code,code,"custom",start.format('YYYY-MM-D'),end.format('YYYY-MM-D'));
        }*/



    });
    $('.dateragepicker_'+code+' span').html(moment().format('MMMM D, YYYY') + ' - ' +
        moment().format('MMMM D, YYYY'));


    $('<div class=\'flotTip\'></div>').appendTo('body').css({
        'position': 'absolute',
        'display': 'none'
    });


}

jQuery(function ($) {
    // init the state from the input
    $(".image-checkbox").each(function () {
        if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
            $(this).addClass('image-checkbox-checked');
        }
        else {
            $(this).removeClass('image-checkbox-checked');
        }
    });

    // sync the state to the input
    $(".image-checkbox").on("click", function (e) {
        if ($(this).hasClass('image-checkbox-checked')) {
            $(this).removeClass('image-checkbox-checked');
            $(this).find('input[type="checkbox"]').first().removeAttr("checked");
        }
        else {
            $(this).addClass('image-checkbox-checked');
            $(this).find('input[type="checkbox"]').first().attr("checked", "checked");
        }

        e.preventDefault();
    });
});

function deletedata(code,rowtb,folder,deltype){

    form_data = new FormData();

    form_data.append("code",code);
    form_data.append("folder",folder);
    form_data.append("del_type",deltype);



    $.ajax({
        url:url+"/Delete",
        dataType: 'script',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post', headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log(data);
            if(data == 1){
                toastr.success($(".success_title").val(),$(".success_detail").val());
                $("#"+rowtb).fadeOut(1000);
            }else{
            }

        },

        error: function (data) {
            console.log(data);
            toastr.error($(".error_title").val(),$(".error_detail").val());
            $("#ModalDanger").modal('show');
            $(".debug_js").html(data.responseText);
        }

    });


}

function SetActive(targetid,bool) {
    var boolset = 0;

    if(bool == true){
        boolset = 1
    }else{
        boolset = 0
    }

    form_data = new FormData();

    form_data.append("targetid",targetid);
    form_data.append("boolset",boolset);


    $.ajax({
        url:url+"/Setactive",
        dataType: 'script',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post', headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log(data);

            if(data == 1){

            }

        },

        error: function (data) {

        }

    });



}