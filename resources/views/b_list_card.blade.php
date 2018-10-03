@extends('Layout/b_layout')
@section("content")
<style>
    input[type=text]:focus{
        color: #0a0a0a !important;
    }
    input[type=text]::placeholder{
        color: #0a0a0a !important;
    }
    input[type=number]:focus{
        color: #0a0a0a !important;
    }
    .form-control{
        color: #0a0a0a;
    }
    .select-dropdown{
        color: #0a0a0a;
    }
    .select-wrapper input.select-dropdown{
        color: #0a0a0a;
    }
    p{
        line-height: 1.5 !important;
    }
    label{
        color: #0a0a0a !important;
        font-size: 15px !important;
    }
</style>
<div class="row">
    <div class="col-md-12 ml-3  pt-3 pb-3">
        <form action="" method="post" class="form-inline">
            <input type="hidden" value="<?PHP echo $page  ?>" id="page" />
            <input type="hidden" value="{{ trans("tool.all") }}" id="all" />
            <div class="md-form">
                <select class="mdb-select" onchange="Gotopage('BackEnd/ListCard/{{ $product }}');" id="sortby">
                    <option <?PHP if($orderby == trans("card.order_date") ){ echo "selected"; } ?> value="{{ trans("card.order_date") }}" >{{ trans("card.order_date") }}</option>
                    <option <?PHP if($orderby == trans("card.order_price") ){ echo "selected"; } ?> value="{{ trans("card.order_price") }}" >{{ trans("card.order_price") }}</option>
                    <option <?PHP if($orderby == trans("card.order_title") ){ echo "selected"; } ?> value="{{ trans("card.order_title") }}" >{{ trans("card.order_title") }}</option>
                </select>
                <label>{{ trans('card.order') }}</label>
            </div>
            <div class="md-form ml-3">
                <select class="mdb-select" onchange="Gotopage('BackEnd/ListCard/{{ $product }}');" id="orderby">
                    <option <?PHP if($sortby == trans("card.sort_desc") ){ echo "selected"; } ?>  value="{{ trans("card.sort_desc") }}" >{{ trans("card.sort_desc") }}</option>
                    <option <?PHP if($sortby == trans("card.sort_desc") ){ echo "selected"; } ?>  value="{{ trans("card.sort_asc") }}" >{{ trans("card.sort_asc") }}</option>
                </select>
                <label>{{ trans('card.sort') }}</label>
            </div>
            <div class="md-form ml-3">
                <label for="limit">{{ trans('card.limit') }}</label>
                <input class="form-control" id="limit" value="<?PHP echo $limit ?>" id="" type="number">
            </div>
            <div class="md-form ml-3" >
                <label for="search">{{ trans('card.search') }}</label>
                <input class="form-control" id="search" value="<?PHP echo $search; ?>" type="text" placeholder="ค้นหา....">
            </div>
            <div class="md-form ml-3">
                <button type="button" onclick="Gotopage('BackEnd/ListCard/{{ $product }}');" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </form>
    </div>
</div>

    <div class="row">
    <div class="card" >
        <div class="card-body">
            <div style="float: left;" > <h4 class="card-title">{{ trans("card.list_data") }}</h4></div>
            <div style="float: right;" > <h4 class="card-title" style="cursor: pointer;" >{{ trans("card.list_add") }} &nbsp;
            <span class="fas fa-plus" style="cursor: pointer;" onclick="window.location='{{ URL::to("/") }}/BackEnd/AddProject'" ></span></h4></div>


            <table class="table text-dark">

                <!--Table head-->
                <thead class="mdb-color light-blue" style="background:#5b350d !important; " >
                <tr>
                    <th style="color: #FFFFFF;" >#</th>
                    <th style="width: 20%;text-align: center;color: #FFFFFF;" >{{ trans("card.list_image") }} </th>
                    <th style="width: 70%;text-align: center;color: #FFFFFF;"  >{{ trans("card.list_detail") }}</th>
                    <th style="width: 10%;color: #FFFFFF;" >{{ trans("card.list_manage") }}</th>
                </tr>
                </thead>
                <!--Table head-->

                <!--Table body-->
                <tbody>
                <?PHP
                $Utility = new \App\Libraries\utility();
                $countdata = 0 ;
                foreach ($data as $result){
                $countdata++;
                ?>
                <tr id="row_{{ $result->card_code }}" >
                    <th scope="row">{{ $countdata }}</th>
                    <td>
                        <div class="view overlay z-depth-1-half">


                            @php
                                $path  = "Media/Card/".$result->card_folder."/".$result->card_cover."_Original.jpg";
                                 if(File::exists($path)){
                                 $path_img = $path;
                                 }else{
                                 $path_img = "image/No-Image16|9.jpg";
                                 }

                            @endphp


                            <img src="{{ URL::to('/') }}/{{ $path_img }}" alt="placeholder" class="img-thumbnail">
                        </div>


                    </td>
                    <td>
                        <div style="float: left;" >
                            <b style="font-weight: bold;" >{{ $result->card_title }}</b>
                            <?PHP
                            echo $Utility->Limittext($result->card_description,300);
                            ?>
                        </div>

                        <div style="float: right;text-align: right;font-size:15px;" >
                            <span class="fas fa-clock" ></span>  {{ $Utility->DateConvert($result->card_date_time) }} <br>
                            <span class="fas fa-clock" ></span> {{ trans("card.list_date") }} {{ $Utility->DetailDatetime($result->card_date_time) }} <br>
                        </div>

                    </td>
                    <td>
                         <button onclick="window.location='{{ URL::to("/") }}/BackEnd/EditCard/{{ $result->card_code }}'" type="button" class="btn btn-primary" style="width: 100px;" >{{ trans("tool.edit") }}</button><br>
                        <button type="button" class="btn btn-danger dropdown-toggle px-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100px;" >{{ trans("tool.delete") }}</button>
                        <div class="dropdown-menu">
                            <a onclick="deletedata('{{ $result->card_code }}','row_{{ $result->card_code }}','{{ $result->card_folder }}','Card')" class="dropdown-item" href="#">{{ trans("tool.delete") }}</a>
                            <a class="dropdown-item" href="#">{{ trans("tool.cancle") }}</a>
                        </div>
                    </td>
                </tr>
                <?PHP
                }
                ?>
                </tbody>
                <!--Table body-->

            </table>

        </div>
    </div>
    </div>

    <!--Pagination-->
    <section class="mt-5">
        <?PHP
        $pagceil = ceil($count/$limit);
        ?>

        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg justify-content-center">

                <li class="page-item">
                    <?PHP
                    if($page == 1 || $page ==  0 ){ ?>

                            <?PHP }else{ ?>
                    <a class="page-link" href="{{ URL::to('/')."/BackEnd/ListCard/".$group."/".$product."/".$sortby."/".$orderby."/".$limit."/".($page+1)."/".$search}}" aria-label="Previous">
                            <span aria-hidden="true"><i class="fas fa-chevron-left"></i>
                            </span><span class="sr-only">Previous</span>
                    </a>
                    <?PHP }
                    ?>
                </li>

                <?PHP
                for ($i = 1 ; $i <= $pagceil ; $i++){ ?>
                <li class="page-item <?PHP if($i == $page){ echo "active"; } ?>"><a class="page-link" href="{{ URL::to('/')."/BackEnd/ListCard/".$group."/".$product."/".$sortby."/".$orderby."/".$limit."/".$i."/".$search}}"><?PHP echo $i ?></a></li>
                <?PHP
                }
                ?>

                <li class="page-item">
                    <?PHP
                    if($page == $pagceil || $page ==  0 ){ ?>

                            <?PHP }else
                    { ?>
                    <a class="page-link" href="{{ URL::to('/')."/BackEnd/ListCard/".$group."/".$product."/".$sortby."/".$orderby."/".$limit."/".($page+1)."/".$search}}" aria-label="Next">
                        <span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                        <span class="sr-only">Next</span></a>
                    <?PHP }
                    ?>
                </li>
            </ul>
        </nav>
    </section>

@endsection
@section("script")
    <script>
        $('.mdb-select').material_select();
    </script>
@endsection