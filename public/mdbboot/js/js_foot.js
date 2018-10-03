// SideNav Initialization
var click ;
$('.mdb-select').material_select();
$('.subject').material_select();
$("#tipsshow").popover();
$('.datepicker').pickadate({
    monthsFull: ['มกราคม', 'กุมภาพันธุ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
    monthsShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
    weekdaysFull: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
    weekdaysShort: ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'],
    format: 'd mmmm yyyy',
    today: '',
    clear: 'ล้างข้อมูล',
    close: 'ยกเลิก'
});


r
/*
function show_error_dialog(){
    $('.status').fadeIn();
    $('.error_box').fadeIn();
}

function hide_error_dialog(){
    $('.status').fadeOut();
    $('.error_box').fadeOut();
}
function show_succes_dialog(){
    $('.status').fadeIn();
    $('.success_box').fadeIn();
}

function hide_succes_dialog(){
    $('.status').fadeOut();
    $('.popupbox').fadeOut();
}
*/


$('.button-collapse').sideNav({
    edge: 'right', // Choose the horizontal origin
    closeOnClick: true // Closes side-nav on &lt;a&gt; clicks, useful for Angular/Meteor
});


$('.button-collapse').sideNav('show');
// Hide sideNav
$('.button-collapse').sideNav('hide');

new WOW().init();



function Dropdown(class_name) {
    $( "."+class_name ).toggle( "fast" );

}
function dropmenu(id) {
    $("#"+id).css("display","none");
    $("#"+id).css("display","block");
}
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
                $("#"+rowtb).fadeOut(1000);
            }else{
            }

        },

        error: function (data) {

        }

    });


}
function Listmanage(link) {
    var sortby = $("#sortby").val();
    var orderby = $("#orderby").val();
    var search = $("#search").val();
    var limit = $("#limit").val();


    if(search == ""){
        window.location=url+"/Backend/"+link+"/"+sortby+"/"+orderby+"/null/"+limit+"/1";
    }else{
        window.location=url+"/Backend/"+link+"/"+sortby+"/"+orderby+"/"+search+"/"+limit+"/1";
    }

}
function Search() {
    var search = $("#search").val();
    //alert(url+"/Search/"+search);
    window.location=url+"/Search/"+search;
}






$(document).ready(function () {


});

