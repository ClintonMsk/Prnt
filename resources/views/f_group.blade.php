<style>
    .margin_top{
        height: 20vmin;
    }
    p,font{
        line-height: 1.5 !important;
        font-size: 1.5em;
        color: #492906
    }
    .cover_detail{
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        -webkit-filter: blur(5px) brightness(1);
    }
    .img_show{
        -webkit-filter: blur(0px) brightness(1) !important;
    }
    .container_cover{
        width: 100%;
        height: 400px;
        overflow: hidden;
        position: relative;
        -webkit-box-shadow: 7px 2px 20px 0px rgba(142, 80, 19, 0.1);
        -moz-box-shadow: 7px 2px 20px 0px rgba(142, 80, 19, 0.1);
        box-shadow: 7px 2px 20px 0px rgba(142, 80, 19, 0.1);
    }
    figure.image{
        text-align: center;
        font-size: 1rem;
    }
</style>

<?PHP
foreach ($data as $result){
    $code = $result->card_code;
    $path  = "Media/Card/".$result->card_folder."/".$result->card_cover."_Original.jpg";
    $path_thumb  = "Media/Card/".$result->card_folder."/".$result->card_cover."_Thumb.jpg";
    if(File::exists($path)){
        $path_img = URL::to('/')."/".$path;
        $path_img_thumb = URL::to('/')."/".$path_thumb;
    }else{
        $path_img = URL::to('/')."/image/No-Image16|9.jpg";
        $path_img_thumb = URL::to('/')."/image/No-Image16|9.jpg";
}
?>

<div class="container-fluid">
    <div class="container_cover" align="center" >
        <div class="cover_detail" align="center" style="overflow: hidden;background: url('{{ $path_img }}');background-size: cover;background-position:center; " >
        </div>
    </div>


</div>
    <div class="container-fluid" style="background: #FFFFFF;padding: 10vmin !important;">
    <div class="row">
        <div align="center" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <h1 style="color: #492906;" >{!! $result->card_title !!}</h1>
            <div class="demo">
                <div class="item">
                    <div class="clearfix" style="max-width:474px;">
                        <ul id="image-gallery" class="gallery list-unstyled cS-hidden">


                            <li data-thumb="{{ $path_img_thumb }}">
                                <a class="fancybox-thumb" rel="fancybox-thumb"  href="{{ $path_img }}" >
                                    <img  src="{{ $path_img_thumb }}" width="500" />
                                </a>
                            </li>

                            <?PHP

                            $data_gal =  \App\Query::selectDataCon("print_gallery","gal_code_content","$code","=");
                            foreach ($data_gal as $result_gal){

                            $patho  = URL::to('/')."/Media/Card/".$result_gal->gal_folder."/Gallery/".$result_gal->gal_name."_Original.jpg";
                            $patht  = URL::to('/')."/Media/Card/".$result_gal->gal_folder."/Gallery/".$result_gal->gal_name."_Thumb.jpg";
                            if(File::exists($path)){
                                $path_img_o = $patho;
                                $path_img_t = $patht;
                            }else{
                                $path_img = "image/No-Image16|9.jpg";
                            }


                            ?>

                            <li data-thumb="{{ $path_img_t }}">
                                <a class="fancybox-thumb" rel="fancybox-thumb"  href="{{ $path_img_o }}" >
                                    <img src="{{ $path_img_t }}" width="500" />
                                </a>
                            </li>


                              <?PHP

                            }
                            ?>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="color: #492906;" >
        <font style="color: #492906;font-size:2rem;" >{{ trans("card.detail") }}</font>
        <p class="paragraph" style="color: #492906;" >
{!! $result->card_description !!}
        </p>
           <table class="table_data" >
               <tr>
                   <td>{{ trans("card.group") }}</td>
                   <td>{{ $group }}</td>
               </tr>
               <tr>
                   <td>{{ trans("card.product") }}</td>
                   <td>{{ $product }}</td>
               </tr>
               <tr>
                   <td>{{ trans("card.dimension") }}</td>
                   <td>{{ $size }}</td>
               </tr>
               <tr>
                   <td>{{ trans("card.paper") }}</td>
                   <td>{{ $paper }}</td>
               </tr>
               <tr>
                   <td>{{ trans("card.time") }}</td>
                   <td>{{ $time }}</td>
               </tr>
               <tr>
                   <td>{{ trans("card.price") }}</td>
                   <td>{{ $result->card_price }}</td>
               </tr>
           </table>
        </div>
    </div>
        <div class="row" style="margin-top: 5rem;" >
            <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12" style="padding-right: 5vmin;padding-left: 10vmin;" >
                <font style="font-size:2rem;" >{{ trans("card.note") }}</font>
                {!! $result->card_note !!}
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12" style="padding-right: 5vmin;padding-left: 10vmin;" >
                {!! $result->card_other !!}
            </div>
        </div>
    </div>



<?PHP
}
?>

    {!! H::script('slide/js/lightslider.js') !!}
<script>
    $(document).ready(function() {
        $("#content-slider").lightSlider({
            loop:true,
            keyPress:true
        });
        $('#image-gallery').lightSlider({
            gallery:true,
            item:1,
            thumbItem:9,
            slideMargin: 0,
            speed:500,
            auto:true,
            loop:true,
            onSliderLoad: function() {
                $('#image-gallery').removeClass('cS-hidden');
            }
        });
    });

    $(".fancyboxthumb").fancybox({
        animationEffect : "zoom",
        transitionEffect : "circular"
    });

    $(".fancybox").fancybox({
        animationEffect : "zoom",
        transitionEffect : "circular",
        loop     : true,
        buttons : [
            'slideShow',
            'fullScreen',
            'thumbs',
            'close'
        ],
    });

    $(".fancybox-thumb").fancybox({
        prevEffect	: 'none',
        nextEffect	: 'none',
        helpers	: {
            title	: {
                type: 'outside'
            },
            thumbs	: {
                width	: 50,
                height	: 50
            }
        }
    });



</script>