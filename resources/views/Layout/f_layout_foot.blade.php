<footer class="page-footer text-center font-small mt-4 wow fadeIn pt-5"  style="background: url('{{ URL::to('/') }}/image/Footer.png')" >
    <div class="container text-center text-md-center" >

        <!-- Grid row -->
        <div class="row" align="center" >

            <div class="col-md-2 col-lg-2"></div>
            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 " style="color: #877054;" >

                <!-- Links -->
                <h5 class="text-uppercase">ร้านการ์ดพิธี</h5>

                <ul class="list-unstyled">
                    <li style="text-align: left;" >
                        -รับงานการ์ดครบวงจร การ์ดงานแต่ง งานบวช งานศพ <br>
                        การ์ดทุกๆ ประเภท ราคาถูก ส่งทั่วไทย พิมพ์น้อยพิมพ์มาก
                        ยินดีให้คำปรึกษา ทักสอบถามราคาก่อนได้ครับผม<br>
                        - ที่อยู่ ต.คลองมะเดื่อ อ.กระทุ่มแบน จ.สมุทรสาคร เทศบาลนคร
                        สมุทรสาคร 74110
                    </li>

                </ul>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 " style="color: #877054;" >

                <h5 class="text-uppercase">ช่องทางการติดต่อ</h5>

                <ul class="list-unstyled">
                    <li style="text-align: left;" >
                        -Google Map แผนที่ร้านการ์งานพิธี  <br>
                        -Email : skncardshop@Gmail.com   <br>
                        -www.skncardshop.com  <br>
                    </li>

                </ul>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 " style="color: #877054;" >

                <h5 class="text-uppercase">Socail Network</h5>

                <ul class="list-unstyled">
                    <li style="text-align: left;" >
                        -รับงานการ์ดครบวงจร การ์ดงานแต่ง งานบวช งานศพ <br>
                        การ์ดทุกๆ ประเภท ราคาถูก ส่งทั่วไทย พิมพ์น้อยพิมพ์มาก
                        ยินดีให้คำปรึกษา ทักสอบถามราคาก่อนได้ครับผม <br>
                        - ที่อยู่ ต.คลองมะเดื่อ อ.กระทุ่มแบน จ.สมุทรสาคร เทศบาลนคร
                        สมุทรสาคร 74110
                    </li>

                </ul>

            </div>
            <!-- Grid column -->

            <div class="col-md-2 col-lg-2"></div>

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="background: #8f7354;" >© 2018 Copyright:
        <a href="https://mdbootstrap.com/bootstrap-tutorial/"> MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
</footer>




{!! H::script('mdbbootf/js/jquery.js') !!}
{!! H::script('mdbbootf/js/jquery-3.3.1.js') !!}
{!! H::script('mdbbootf/js/bootstrap.min.js') !!}
{!! H::script('mdbbootf/js/popper.min.js') !!}
{!! H::script('mdbbootf/js/compiled.js') !!}
{!! H::script('mdbbootf/js/mdb.js') !!}
{!! H::script('mdbbootf/js/nprogress.js') !!}
{!! H::script('mdbbootf/js/js_head.js') !!}



{!! H::script('bootstrapinput/js/fileinput.js') !!}
{!! H::script('bootstrapinput/js/locales/LANG.js') !!}
{!! H::script('bootstrapinput/js/locales/th.js') !!}
{!! H::script('bootstrapinput/js/plugins/piexif.js') !!}
{!! H::script('bootstrapinput/js/plugins/purify.js') !!}
{!! H::script('bootstrapinput/js/plugins/sortable.js') !!}
{!! H::script('fancybox/jquery.fancybox.js') !!}


{!! H::script('cke/ckeditor.js') !!}
{!! H::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyCuMxUZvT8ebKNfBG1tWqRBA2YHVOeWWWA') !!}



<!-- Initializations -->
<script type="text/javascript">
    var open = false;
    // Animations initialization
    new WOW().init();
</script>
@yield("script")
<script>
    var load_detail = $(".load_detail").val();
    var code_detail = $(".code_detail").val();
    Setpage();
    if(load_detail == "true" ){
        //alert(code_detail);
        SetpageModal(code_detail);
    }

    function SetMap() {
        var myLatLng = {lat: 13.64986, lng: 100.3021};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom:15,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'ร้านการ์ดงานพิธี งานแต่ง งานบวช งานศพ สมุทรสาคร ราคาถูก\n'
        });
    }
</script>

