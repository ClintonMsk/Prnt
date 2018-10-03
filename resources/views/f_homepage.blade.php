<style>
    @media only screen and (max-width: 600px) {
        .main_layout{
            margin-top: 50px;
        }
    }
</style>
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel" style="overflow: hidden;" >
        <!--Indicators-->
        <ol class="carousel-indicators" style="display: none;" >
            <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-2" data-slide-to="1"></li>
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="view">
                    <img class="d-block w-100" src="{{ URL::to('/') }}/image/Slide2.jpg" alt="First slide">
                </div>
            </div>
            <div class="carousel-item ">
                <div class="view">
                    <img class="d-block w-100" src="{{ URL::to('/') }}/image/Slide.png" alt="First slide">
                </div>
            </div>
        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
        <div style="position: absolute;right: 0;margin-top: -4vmin;margin-right: 16vmin;z-index: 2900" >
            <img onclick="window.location='https://www.facebook.com/skncardshop/'" src="{{ URL::to('/') }}/image/Facebook.png" style="width: 18vmin;margin-right: 1vmin;cursor: pointer;" >
            <img src="{{ URL::to('/') }}/image/Line.png" onclick="window.location='http://line.me/ti/p/~@wrs8778a'" style="width: 18vmin;margin-right: 1vmin;cursor: pointer;" >
            <img onclick="window.location='tel:+66911019917'" src="{{ URL::to('/') }}/image/Tell.png" style="width: 18vmin;cursor: pointer;" >
        </div>

    </div>

    <div class="container-fluid" style="background: #FFFFFF">
        <div align="center" style="padding-top:5vh;" >
            <img src="{{ URL::to('/') }}/image/objective.jpg" class="img-fluid" style="width: 100% !important;" >
            <img src="{{ URL::to('/') }}/image/Howto_Buy.jpg" class="img-fluid" style="width: 100% !important;" >
            <img src="{{ URL::to('/') }}/image/product.jpg" class="img-fluid" style="width: 100% !important;" >
        </div>
        <h2 class="text-center" style="padding-top: 5vmin;" >{{ trans("tool.last_card") }}</h2>
        <div class="row" style="padding: 10vmin;padding-top: 0;padding-bottom: 0;" >
            <?PHP
            $card_last = \App\Query::CustomQuery("SELECT * FROM print_card LIMIT 4 ");
            foreach ($card_last as $result_last){

            $path  = "Media/Card/".$result_last->card_folder."/".$result_last->card_cover."_Thumb.jpg";
            if(File::exists($path)){
                $path_img = URL::to('/')."/".$path;
            }else{
                $path_img = "image/No-Image16|9.jpg";
            }

            ?>
        <div align="center" style="cursor: pointer;margin-bottom:20px;" onclick="SetpageModal('{{ $result_last->card_code }}')" class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <img src="{{ $path_img }}"  class="img_last" ><br>
            <font class="card_title" style="font-size:20px;" >{{ $result_last->card_title}}</font>
        </div>
            <?PHP
                }
                ?>

        </div>
        <div class="container-fluid" style="background: #FFFFFF">
            <img src="{{ URL::to('/') }}/image/contact.jpg" class="img-fluid" style="width: 100% !important;" >
        </div>
    </div>
