 <?PHP
                foreach ($data as $result){
                $path  = "Media/Card/".$result->card_folder."/".$result->card_cover."_Thumb.jpg";
                if(File::exists($path)){
                    $path_img = $path;
                }else{
                    $path_img = "image/No-Image16|9.jpg";
                }
                ?>

                <div class="col-xl-3 col-md-6 col-sm-12 col-xs-12" style="cursor: pointer;" onclick="Setpage('DetailPageSet/{{ $result->card_code  }}','../Detail/{{ $result->card_code  }}')" >
                    <img src="{{ URL::to('/') }}/{{ $path_img }}" alt="placeholder" class="img-thumbnail">
                    <font style="font-size:20px;" >{{ $result->card_title}}</font>
                </div>
               <?PHP
               }
               ?>
