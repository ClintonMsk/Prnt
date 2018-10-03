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

<div class="row content_modal" style="position: relative;background: #fff9ed;padding-top:5vmin;padding-bottom:5vmin;border: 5px solid #FFF;border-radius: 50px;" >
    <button onclick="$('.modal_detail').fadeOut('1000')" style="cursor: pointer;width: 20px;height: 20px;position: absolute;right: 20px;align-content: center;z-index: 7000;border:none;background: none" >
        <i class="fas fa-close" style="color: #804a18;font-size:25px;" ></i>
    </button>
    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 img_detail" style="align-content: center;align-items: center;" >
        <a class="fancybox-thumb" rel="fancybox-thumb"  href="{{ $path_img }}" >
            <img class="img_detail" src="{{ $path_img_thumb }}"  />
        </a>
        <ul class="galery_list" >

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

            <li>
                <a class="fancybox-thumb" rel="fancybox-thumb"  href="{{ $path_img_o }}" >
                    <img class="img_detail" src="{{ $path_img_t }}"  />
                </a>
            </li>

                <?PHP
                }
                ?>
        </ul>
    </div>
    <?PHP
    if($result->card_product != '3cf26'){
    ?>
    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" style="position: relative;" >
        <h3 class="head" >{{ $result->card_title }}</h3>
            {!! $result->card_description !!}
        <table class="table_data" >
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
            <tr style="border: none !important;" >
                <td colspan="1" style="text-align: left;font-size:3em"  >
                    <i class="fab fa-facebook-square" ></i>
                    <i class="fab fa-twitter-square"></i>
                    <i class="fab fa-google-plus-square"></i>
                </td>
                <td colspan="1" style="text-align: right;font-size:3em"  >
                    <i class="fab fa-facebook-messenger" ></i>
                    <i class="fab fa-line"></i>
                    <i class="fab fa-google-plus-square"></i>
                </td>
            </tr>
        </table>
    </div>
    <?PHP
    }
    ?>
</div>

<?PHP
}
?>

<script>
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
