<style>
    .margin_top{
        height: 20vmin;
    }
    input[type=text]:focus{
        color: #0a0a0a !important;
        font-size:1.1rem !important;
    }
    input[type=text]::placeholder{
        color: #0a0a0a !important;
        font-size:1.1rem !important;
    }
    input[type=number]:focus{
        color: #0a0a0a !important;
        font-size:1.1rem !important;
    }
    .form-control{
        color: #0a0a0a;
        font-size:1.1rem !important;
    }
    .select-dropdown{
        color: #0a0a0a;
        font-size:1.1rem !important;
    }
    .select-wrapper input.select-dropdown{
        color: #0a0a0a;
        font-size:1.1rem !important;
    }
    p{
        line-height: 1.5 !important;
    }
    label{
        color: #0a0a0a !important;
        font-size: 1.5rem !important;
    }
    .filter{
        font-size: 2rem !important;
        text-align: center;
        align-content: center;
    }
    header{
        height: 130px !important;
    }
</style>

<div class="container-fluid">
    <div class="container-fluid" style="background: #FFFFFF;padding: 10vmin !important;padding-top: 0px !important;">
        <div class="container" style="padding-top: 100px;" >
            <h3>{{ $product }}</h3>
            <div class="row content_list">
                <?PHP
                foreach ($data as $result){
                $path  = "Media/Card/".$result->card_folder."/".$result->card_cover."_Thumb.jpg";
                if(File::exists($path)){
                    $path_img = $path;
                }else{
                    $path_img = "image/No-Image16|9.jpg";
                }
                ?>

                <div class="col-xl-3 col-md-6 col-sm-12 col-xs-12" style="cursor: pointer;" onclick="SetpageModal('{{ $result->card_code }}')" >
                    <img src="{{ URL::to('/') }}/{{ $path_img }}" alt="placeholder" class="img-thumbnail">
                    <font style="font-size:20px;" >{{ $result->card_title}}</font>
                </div>
               <?PHP
               }
               ?>
            </div>
        </div>
    </div>
</div>
<script>
    $('.mdb-select').material_select();
</script>