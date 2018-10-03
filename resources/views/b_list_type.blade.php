@extends('Layout/b_layout')
@section("content")
    <div class="card" >
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav  md-pills pills-primary flex-column" role="tablist">
                      <?PHP
                            $count = 0;
                        foreach ($data as $result){
                            $count++;
                            if($count == 1){
                                $active = "active";
                            }else{
                                $active = "";
                            }
                        $title_h = "";
                        switch ($result->type_main_title) {
                            case "product";
                                $title_h = "ประเภทสินค้า";
                                break;
                            case "dimensions";
                                $title_h = "ขนาดของกระดาษ";
                                break;
                            case "type_paper";
                                $title_h = "ประเภทกระดาษ";
                                break;
                            case "printime";
                                $title_h = "เวลาในการพิมพ์";
                                break;
                        }

                            ?>
                            <li class="nav-item">
                                <a class="nav-link {{ $active }}" data-toggle="tab" href="#{{ $result->type_main_title }}" role="tab">
                                    <b>{{ $title_h }}</b>
                                </a>
                            </li>
                       <?PHP }
                        ?>

                    </ul>
                </div>
                <div class="col-md-9">
                    <!-- Tab panels -->
                    <div class="tab-content vertical">
                        <!--Panel 1-->
                        <?PHP
                        $count = 0;
                        foreach ($data as $result){
                        $title = "";
                        switch ($result->type_main_title) {
                            case "product";
                                $title = "ประเภทสินค้า";
                            break;
                                break;
                            case "dimensions";
                                $title = "ขนาดของกระดาษ";
                                break;
                            case "type_paper";
                                $title = "ประเภทกระดาษ";
                                break;
                            case "printime";
                                $title = "เวลาในการพิมพ์";
                                break;
                        }
                        $count++;
                        if($count == 1){
                            $active = "active";
                        }else{
                            $active = "";
                        }
                            ?>
                        <div class="tab-pane fade in show {{ $active }}" id="{{ $result->type_main_title }}" role="tabpanel">
                            <h3 class="my-2 h3">{{ $title }}</h3>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th width="50" scope="col">#</th>
                                    <th width="500" scope="col">{{ trans("tool.title") }}</th>
                                    <th width="50" scope="col">{{ trans("tool.manage") }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?PHP
                                $data = \App\Query::selectDataCon("print_type","type_main_title","$result->type_main_title","=");
                                $count_data = 0;
                                foreach ($data as $result){
                                $count_data++;
                                ?>
                                <tr>
                                    <th scope="row">
                                        {{ $count_data }}
                                    </th>
                                    <td style="position: relative;" >
                                        <img style="position: absolute;right: -50px;top: -5px;display: none;" src="{{ URL::to('/') }}/image/load_edit.gif" height="100" class="load_{{ $result->type_code }}" >
                                        <input type="text"  readonly value="{{ $result->type_title }}" onkeyup="Edit('{{ $result->type_code }}')" ondblclick="$(this).removeAttr('readonly')" class="form-control ip_{{ $result->type_code }}" />
                                    </td>
                                    <td>
                                        <button class="btn btn-danger" >
                                            {{ trans("tool.delete") }}
                                        </button>
                                    </td>
                                </tr>
                                <?PHP
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <?PHP }
                        ?>

                        <!--/.Panel 1-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@section("script")
    <script>
        function Edit(code) {

                var title = $(".ip_"+code).val();
                var form_data = new FormData();

                form_data.append("title",title);
                form_data.append("code",code);
                $(".load_"+code).fadeIn();
                $.ajax({
                    url:url+"/UpdateType",
                    dataType:'script',
                    type:'post',
                    data:form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    cache:false,
                    contentType:false,
                    processData:false,
                    type: 'post', headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function (data) {
                        data = JSON.parse(data);
                        console.log(data);
                        if(data["Status"] == "Success" ){
                            $(".load_"+code).fadeOut();
                        }
                    },
                    error:function (data) {
                        toastr.error($(".error_edit_text").val(),$(".error_title"));
                    }
                });
        }
    </script>
@endsection   