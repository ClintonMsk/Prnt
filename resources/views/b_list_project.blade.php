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
</style>
<div class="row">
    <div class="col-md-12 ml-3  pt-3 pb-3">
        <form action="" method="post" class="form-inline">
            <input type="hidden" value="<?PHP echo $page  ?>" id="page" />
            <div class="form-group">
                <select class="mdb-select" onchange="Gotopage('BackEnd/ListProject');" id="sortby">
                    <option <?PHP if($sortby == "project_date_add" ){ echo "selected"; } ?> value="project_date_add" >{{ trans("activity.sort_date") }}</option>
                </select>
            </div>
            <div class="form-group ml-3">
                <select class="mdb-select" onchange="Gotopage('BackEnd/ListProject');" id="orderby">
                    <option <?PHP if($orderby == "DESC" ){ echo "selected"; } ?>  value="DESC" >{{ trans("activity.DESC") }}</option>
                    <option <?PHP if($orderby == "ASC" ){ echo "selected"; } ?>  value="ASC" >{{ trans("activity.ASC") }}</option>
                </select>
            </div>
            <div class="form-group ml-3">
                <input class="form-control" id="limit" value="<?PHP echo $limit ?>" id="" type="number">



            </div>
            <div class="form-group ml-3" >
                <input class="form-control" id="search" value="<?PHP echo $search; ?>" type="text" placeholder="ค้นหา....">
            </div>
            <div class="form-group ml-3">
                <button type="button" onclick="Gotopage('BackEnd/ListProject');" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </form>
    </div>
</div>

    <div class="row">
    <div class="card" >
        <div class="card-body">
            <div style="float: left;" > <h4 class="card-title">{{ trans("project.list_data") }}</h4></div>
            <div style="float: right;" > <h4 class="card-title" style="cursor: pointer;" >{{ trans("project.list_add") }} &nbsp;
            <span class="fas fa-plus" style="cursor: pointer;" onclick="window.location='{{ URL::to("/") }}/BackEnd/AddProject'" ></span></h4></div>


            <table class="table text-dark">

                <!--Table head-->
                <thead class="mdb-color light-blue" style="background:#ba1120 !important; " >
                <tr>
                    <th style="color: #FFFFFF;" >#</th>
                    <th style="width: 20%;text-align: center;color: #FFFFFF;" >{{ trans("project.list_image") }} </th>
                    <th style="width: 70%;text-align: center;color: #FFFFFF;"  >{{ trans("project.list_detail") }}</th>
                    <th style="width: 10%;color: #FFFFFF;" >{{ trans("project.list_manage") }}</th>
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
                <tr id="row_{{ $result->project_code }}" >
                    <th scope="row">{{ $countdata }}</th>
                    <td>
                        <div class="view overlay z-depth-1-half">


                            @php
                                $path  = "Media/Project/".$result->project_folder."/".$result->project_cover_main."_Original.jpg";
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
                            <b style="font-weight: bold;" >{{ $result->project_title }}</b>
                            <?PHP
                            echo $Utility->Limittext($result->project_detail,800);
                            ?>
                        </div>

                        <div style="float: right;text-align: right;font-size:15px;" >
                            <span class="fas fa-clock" ></span>  {{ $Utility->DateConvert($result->project_date_add) }} <br>
                            <span class="fas fa-clock" ></span> {{ trans("project.list_date") }} {{ $Utility->DetailDatetime($result->project_date_add) }} <br>
                        </div>

                    </td>
                    <td>
                       <!-- <button onclick="window.location='{{ URL::to("/") }}/EditPlace/{{ $result->project_code }}'" type="button" class="btn btn-primary" style="width: 100px;" >{{ trans("tool.edit") }}</button><br>
                        -->
                        <button type="button" class="btn btn-danger dropdown-toggle px-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100px;" >{{ trans("tool.delete") }}</button>
                        <div class="dropdown-menu">
                            <a onclick="deletedata('{{ $result->project_code }}','row_{{ $result->project_code }}','{{ $result->project_folder }}','Project')" class="dropdown-item" href="#">{{ trans("tool.delete") }}</a>
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
                    <a class="page-link" href="{{ URL::to('/')."/BackEnd/ListProject/".$sortby."/".$orderby."/".$limit."/".($page-1)."/".$search}}" aria-label="Previous">
                            <span aria-hidden="true"><i class="fas fa-chevron-left"></i>
                            </span><span class="sr-only">Previous</span>
                    </a>
                    <?PHP }
                    ?>
                </li>

                <?PHP
                for ($i = 1 ; $i <= $pagceil ; $i++){ ?>
                <li class="page-item <?PHP if($i == $page){ echo "active"; } ?>"><a class="page-link" href="{{ URL::to('/')."/BackEnd/ListProject/".$sortby."/".$orderby."/".$limit."/".$i."/".$search}}"><?PHP echo $i ?></a></li>
                <?PHP
                }
                ?>

                <li class="page-item">
                    <?PHP
                    if($page == $pagceil || $page ==  0 ){ ?>

                            <?PHP }else
                    { ?>
                    <a class="page-link" href="{{ URL::to('/')."/BackEnd/ListProject/".$sortby."/".$orderby."/".$limit."/".($page+1)."/".$search}}" aria-label="Next">
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