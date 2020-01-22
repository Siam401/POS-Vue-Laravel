<?php

namespace App\Http\Controllers;
use App\Category1;
use App\Company1;
use App\Stock;
use App\Solditem;
use App\Tamp;
use Response;
use DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function category(){

        $categories=Category1::all();

        return view('backend.categories.index',compact('categories'));
    }
    public function company(){

        $companys=Company1::all();

        return view('backend.companys.index',compact('companys'));
    }
    public function stock(){

        $stocks=Stock::all();

        return view('backend.stocks.index',compact('stocks'));
    }
    public function saleview(){
        $stocks=Stock::all();
        $tamps=Tamp::all();
        return view('backend.sales.sale',compact('stocks','tamps'));
    }

    public function stocks(){
        $stocks=DB::table('stocks')->get();
        $tamps=DB::table('tamps')->get();
        $alldata=array("stocks"=>$stocks,"tamps"=> $tamps);
        return Response::json($alldata);
    }

    public function addForSale($id){
        $alldata=array();
        $stock=DB::table('stocks')->where('id', $id)->first();

        if($stock->quantity>=1){

            $tamp_data=DB::table('tamps')->where('stockid', $id)->first();
            // dd($tamp_data);
            if(!$tamp_data){
                $stock->quantity=$stock->quantity-1;
                DB::table('stocks')->where('id', $id)->update(['quantity' => $stock->quantity]);

                $tamp_data['stockid']=$stock->id;
                $tamp_data['name']=$stock->name;
                $tamp_data['getprice']=$stock->getprice;
                $tamp_data['sellprice']=$stock->sellprice;
                $tamp_data['quantity']=1;
                $tamp_data['categoryid']=$stock->categoryid;
                $tamp_data['companyid']=$stock->companyid;
                $tamp_data['barcode']=$stock->barcode;
                $tamp_data['maxquantity']=$stock->quantity;
    
                Tamp::create($tamp_data);
                $tamp_all_data=DB::table('tamps')->orderBy('id','ASC')->get();
                $stock_all_data=DB::table('stocks')->orderBy('id','ASC')->get();
                $alldata=array("stocks"=>$stock_all_data,"tamps"=> $tamp_all_data);
                
                return Response::json($alldata);
            }else{
                $quantity=$tamp_data->quantity+1;
                $maxquantity=$tamp_data->maxquantity-1;
                DB::table('tamps')->where('stockid', $id)->update(['quantity' => $quantity,'maxquantity'=>$maxquantity]);
                DB::table('stocks')->where('id', $id)->update(['quantity' => $maxquantity]);
                $tamp_all_data=DB::table('tamps')->orderBy('id','ASC')->get();
                $stock_all_data=DB::table('stocks')->orderBy('id','ASC')->get();
                $alldata=array("stocks"=>$stock_all_data,"tamps"=> $tamp_all_data);
                return Response::json($alldata);
            }
        }
        $tamp_all_data=DB::table('tamps')->orderBy('id','ASC')->get();
        $stock_all_data=DB::table('stocks')->orderBy('id','ASC')->get();
        $alldata=array("stocks"=>$stock_all_data,"tamps"=> $tamp_all_data);
        return Response::json($alldata);
    }

    public function removeFromTamp($id){
        $tamp_data=DB::table('tamps')->where('stockid', $id)->first();

        $stock=DB::table('stocks')->where('id', $id)->first();
        $quantity=$stock->quantity+$tamp_data->quantity;
        DB::table('stocks')->where('id', $id)->update(['quantity' => $quantity]);
        DB::table('tamps')->where('stockid', $id)->delete();

        $tamp_all_data=DB::table('tamps')->orderBy('id','ASC')->get();
        $stock_all_data=DB::table('stocks')->orderBy('id','ASC')->get();
        $alldata=array("stocks"=>$stock_all_data,"tamps"=> $tamp_all_data);
        return Response::json($alldata);

    }
}
