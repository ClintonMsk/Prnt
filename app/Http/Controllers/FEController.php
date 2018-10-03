<?php

namespace App\Http\Controllers;

use function GuzzleHttp\Psr7\stream_for;
use http\Env\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\View\View;
use App\Query;
use App\Libraries\utility;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class FEController extends BaseController
{

    public function __construct()
    {
      $this->Mainfolder = "Activity";
    }

    public function RouteSet(\Illuminate\Http\Request $request){
        $page = $request->page;
        $setpage = "";

        switch ($page){
            case "Home":
                $setpage = "HomePageSet";
                break;
                default:
            $setpage = "HomePageSet";
                    break;
        }

        return View("Layout.f_layout")
            ->with("page",$setpage)
            ->with("pages","")
            ->with("code","false")
            ->with("load_detail",'false')
            ->with("title",trans("tool.SystemTitleName"))
            ->with("description",trans("tool.description") )
            ->with("image",'/image/logo.jpg')
            ;
    }
    public function RouteSetDetail(\Illuminate\Http\Request $request){
        $code = $request->code;
        $setpage = "";

        $setpage = "HomePageSet";

        $data = Query::selectDataCon("print_card","card_code","$code","=");
        if(count($data) != 0 ){
            foreach ($data as $result){
                $title = $result->card_title;
                $description = strip_tags($result->card_description);


                $path  = "Media/Card/".$result->card_folder."/".$result->card_cover."_Original.jpg";
                $path_socail  = "Media/Card/".$result->card_folder."/".$result->card_cover."_Socail.jpg";
                if(File::exists($path)){
                    $path_img_socail = "/".$path_socail;
                }else{
                    $path_img_socail = "/image/No-Image16|9.jpg";
                }
            }
        }else{
            return redirect('Home');
        }



        return View("Layout.f_layout")
            ->with("page",$setpage)
            ->with("pages","")
            ->with("code",$code)
            ->with("load_detail",'true')
            ->with("title",$title)
            ->with("description",$description)
            ->with("image",$path_img_socail)
            ;
    }
    public function RouteSetList(\Illuminate\Http\Request $request){

        $limit = $request->limit;
        $group = $request->group;
        $product = $request->product;
        $search = $request->search;
        $orderby = $request->orderby;
        $sortby = $request->sortby;
        $page = $request->page;


        $setpage = "ListPageSet/".$product."/".$orderby."/".$sortby."/".$limit."/".$page."/".$search;



        return View("Layout.f_layout")
            ->with("page",$setpage)
            ->with("pages","/".$group."/".$product)
            ->with("load_detail",'false')
            ->with("code",'')
            ->with("title",trans("tool.SystemTitleName"))
            ->with("description",trans("tool.description") )
            ->with("image",'/image/logo.jpg')
            ;
    }
    public function RouteSetEnvelope(\Illuminate\Http\Request $request){

       $setpage = "EnvelopePageSet";

        return View("Layout.f_layout")
            ->with("page",$setpage)
            ->with("pages","")
            ->with("load_detail",'false')
            ->with("code","false")
            ->with("load_detail",'false')
            ->with("title",trans("tool.SystemTitleName"))
            ->with("description",trans("tool.description") )
            ->with("image",'/image/logo.jpg')
            ;
    }
    public function RoutePromotion(\Illuminate\Http\Request $request){

       $setpage = "PromotionPageSet";

        return View("Layout.f_layout")
            ->with("page",$setpage)
            ->with("pages","")
            ->with("load_detail",'false')
            ->with("code","false")
            ->with("load_detail",'false')
            ->with("title",trans("tool.SystemTitleName"))
            ->with("description",trans("tool.description") )
            ->with("image",'/image/logo.jpg')
            ;
    }
    public function RouteSetAbout(\Illuminate\Http\Request $request){

       $setpage = "AboutPageSet";

        return View("Layout.f_layout")
            ->with("page",$setpage)
            ->with("pages","")
            ->with("load_detail",'false')
            ->with("code","false")
            ->with("load_detail",'false')
            ->with("title",trans("tool.SystemTitleName"))
            ->with("description",trans("tool.description") )
            ->with("image",'/image/logo.jpg')
            ;
    }


    public function Homepage(){

        return View("f_homepage")
            ->with("page","HomePage")
            ;
    }


    public function Detail(\Illuminate\Http\Request $request){
       $code = $request->code;

       $group = "";
       $product = "";
       $size = "";
       $paper = "";
       $time = "";

       $data = Query::selectDataCon("print_card","card_code","$code","=");
       $gallery = Query::selectDataCon("print_gallery","gal_code_content","$code","=");

       if(count($data) > 0){
           $product_code = $data[0]->card_product;
           $size_code = $data[0]->card_dimension;
           $paper_code = $data[0]->card_type;
           $time_code = $data[0]->card_printing_time;
           $product_data = Query::selectDataCon("print_type","type_code","$product_code","=");
           $size_data = Query::selectDataCon("print_type","type_code","$size_code","=");
           $paper_data = Query::selectDataCon("print_type","type_code","$paper_code","=");
           $time_data = Query::selectDataCon("print_type","type_code","$time_code","=");




           if(count($product_data) > 0){
               $product = $product_data[0]->type_title;
           }


           if(count($size_data) > 0){
               $size = $size_data[0]->type_title;
           }

           if(count($paper_data) > 0){
               $paper = $paper_data[0]->type_title;
           }


           if(count($time_data) > 0){
               $time = $time_data[0]->type_title;
           }




       }



        return View("f_modal_detail")
            ->with("data",$data)
            ->with("gallery",$gallery)
            ->with("product",$product)
            ->with("size",$size)
            ->with("paper",$paper)
            ->with("time",$time)
            ;
    }
    public function List(\Illuminate\Http\Request $request){

        $limit = $request->limit;
        $group = $request->group;
        $product = $request->product;
        $search = $request->search;
        $orderby = $request->orderby;
        $sortby = $request->sortby;

        $group_code = "";
        $product_code = "";
        $order = "";
        $sort = "";

        switch ($orderby){
            case "วันที่":
                $order = "card_date_time";
                break;
            case "ราคา":
                $order = "card_price";
                break;
            case "ชื่อ":
                $order = "card_title";
                break;
            default:
                $order = "card_date_time";
                break;
        }


        switch ($sortby){
            case "มากไปน้อย":
                $sort = "DESC";
                break;
            case "น้อยไปมาก":
                $sort = "ASC";
                break;
            default:
                $sort = "DESC";
                break;
        }

        //echo $sort;
        //echo $order;

        //exit();

        // echo $limit;


        if ($request->page == 0) {
            $page_number = 0;
        } else {
            $page_number = (($request->page - 1) * $limit);
        }

        $group_data = Query::CustomQuery("SELECT * FROM print_type WHERE type_main_title = 'group' AND type_title = '$group' ");
        $product_data = Query::CustomQuery("SELECT * FROM print_type WHERE type_main_title = 'product' AND type_title = '$product' ");

        //exit();

       // echo $group ."<br>";
       // echo $product ."<br>";


        if(count($product_data) != 0 ){
            $product_code = $product_data[0]->type_code;
        }
       // echo $group_code ."<br>";
       // echo $product_code ."<br>";



        if($product == trans("tool.all") && $search == trans("tool.all")  ){

            $input = array('card_product','card_title');
            $con = array('LIKE','LIKE','LIKE');
            $value = array('%'.''.'%','%'.''.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);

        }
        /*All*/

        /*Condition*/
        if($product == trans("tool.all") && $search == trans("tool.all")  ){


            $input = array('card_product','card_title');
            $con = array('LIKE','LIKE');
            $value = array('%'.''.'%','%'.''.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);
            //echo  "2";
            //exit();


        }
        if( $product != trans("tool.all") && $search == trans("tool.all")  ){

            $input = array('card_product','card_title');
            $con = array('LIKE','LIKE');
            $value = array('%'.$product_code.'%','%'.''.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);




        }
        if($product == trans("tool.all") && $search != trans("tool.all")  ){

            $input = array('card_product','card_title');
            $con = array('LIKE','LIKE');
            $value = array('%'.''.'%','%'.$search.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);




        }
        /*Condition*/


        /*Contition multi*/
        if($product != trans("tool.all") && $search == trans("tool.all")  ){

            $input = array('card_product','card_title');
            $con = array('LIKE','LIKE');
            $value = array('%'.$product_code.'%','%'.''.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);




        }

        if( $product != trans("tool.all") && $search != trans("tool.all")  ){

            $input = array('card_product','card_title');
            $con = array('LIKE','LIKE');
            $value = array('%'.$product_code.'%','%'.$search.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);




        }

        if($product == trans("tool.all") && $search != trans("tool.all")  ){

            $input = array('card_product','card_title');
            $con = array('LIKE','LIKE');
            $value = array('%'.''.'%','%'.$search.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);




        }



        return View("f_list_group")
            ->with("data",$data)
            ->with("count", count($all))
            ->with("limit", $request->limit)
            ->with("sortby", $request->sortby)
            ->with("orderby", $request->orderby)
            ->with("search", $request->search)
            ->with("group", $group)
            ->with("product",$product)
            ->with("page", $request->page);
        ;

    }
    public function Lists(\Illuminate\Http\Request $request){

        $limit = $request->limit;
        $group = $request->group;
        $product = $request->product;
        $search = $request->search;
        $orderby = $request->orderby;
        $sortby = $request->sortby;

        $group_code = "";
        $product_code = "";
        $order = "";
        $sort = "";

        switch ($orderby){
            case "วันที่":
                $order = "card_date_time";
                break;
            case "ราคา":
                $order = "card_price";
                break;
            case "ชื่อ":
                $order = "card_title";
                break;
            default:
                $order = "card_date_time";
                break;
        }


        switch ($sortby){
            case "มากไปน้อย":
                $sort = "DESC";
                break;
            case "น้อยไปมาก":
                $sort = "ASC";
                break;
            default:
                $sort = "DESC";
                break;
        }

        //echo $sort;
        //echo $order;

        //exit();

        // echo $limit;


        if ($request->page == 0) {
            $page_number = 0;
        } else {
            $page_number = (($request->page - 1) * $limit);
        }

        $group_data = Query::CustomQuery("SELECT * FROM print_type WHERE type_main_title = 'group' AND type_title = '$group' ");
        $product_data = Query::CustomQuery("SELECT * FROM print_type WHERE type_main_title = 'product' AND type_title = '$product' ");

        //exit();

       // echo $group ."<br>";
       // echo $product ."<br>";

        if(count($group_data) != 0 ){
            $group_code = $group_data[0]->type_code;
        }

        if(count($product_data) != 0 ){
            $product_code = $product_data[0]->type_code;
        }
       // echo $group_code ."<br>";
       // echo $product_code ."<br>";




        /*All*/
        if($group == trans("tool.all") && $product == trans("tool.all") && $search == ""  ){

            $input = array('card_group','card_product','card_title');
            $con = array('LIKE','LIKE','LIKE');
            $value = array('%'.''.'%','%'.''.'%','%'.''.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);

        }
        /*All*/

        /*Condition*/
        if($group != trans("tool.all") && $product == trans("tool.all") && $search == ""  ){


            $input = array('card_group','card_product','card_title');
            $con = array('LIKE','LIKE','LIKE');
            $value = array('%'.$group_code.'%','%'.''.'%','%'.''.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);
            //echo  "2";
            //exit();


        }
        if($group == trans("tool.all") && $product != trans("tool.all") && $search == ""  ){

            $input = array('card_group','card_product','card_title');
            $con = array('LIKE','LIKE','LIKE');
            $value = array('%'.''.'%','%'.$product_code.'%','%'.''.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);




        }
        if($group == trans("tool.all") && $product == trans("tool.all") && $search != ""  ){

            $input = array('card_group','card_product','card_title');
            $con = array('LIKE','LIKE','LIKE');
            $value = array('%'.''.'%','%'.''.'%','%'.$search.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);




        }
        /*Condition*/


        /*Contition multi*/
        if($group != trans("tool.all") && $product != trans("tool.all") && $search == ""  ){

            $input = array('card_group','card_product','card_title');
            $con = array('LIKE','LIKE','LIKE');
            $value = array('%'.$group_code.'%','%'.$product_code.'%','%'.''.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);




        }
        if($group != trans("tool.all") && $product != trans("tool.all") && $search != ""  ){

            $input = array('card_group','card_product','card_title');
            $con = array('LIKE','LIKE','LIKE');
            $value = array('%'.$group_code.'%','%'.$product_code.'%','%'.$search.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);




        }
        if($group != trans("tool.all") && $product == trans("tool.all") && $search != ""  ){

            $input = array('card_group','card_product','card_title');
            $con = array('LIKE','LIKE','LIKE');
            $value = array('%'.$group_code.'%','%'.''.'%','%'.$search.'%');

            $data = Query::PaginationContitionSortLimitand("print_card", $page_number, $limit, "$sort", "$order", $input, $value, $con);
            $all = Query::PaginationContitionSortand("print_card", "$sort", "$order", $input, $value, $con);




        }



        return View("f_lists_group")
            ->with("data",$data)
            ->with("count", count($all))
            ->with("limit", $request->limit)
            ->with("sortby", $request->sortby)
            ->with("orderby", $request->orderby)
            ->with("search", $request->search)
            ->with("group", $group)
            ->with("product",$product)
            ->with("page", $request->page);
        ;

    }
    public function Envelope(\Illuminate\Http\Request $request){

        return View("f_envelope")
        ;

    }
    public function Promotion(\Illuminate\Http\Request $request){

        return View("f_promotion")
            ;

    }
    public function About(\Illuminate\Http\Request $request){

        return View("f_about")
        ;

    }



}



