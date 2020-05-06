<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $dbc = array(
            '０' , '１' , '２' , '３' , '４' ,
            '５' , '６' , '７' , '８' , '９' ,
            'Ａ' , 'Ｂ' , 'Ｃ' , 'Ｄ' , 'Ｅ' ,
            'Ｆ' , 'Ｇ' , 'Ｈ' , 'Ｉ' , 'Ｊ' ,
            'Ｋ' , 'Ｌ' , 'Ｍ' , 'Ｎ' , 'Ｏ' ,
            'Ｐ' , 'Ｑ' , 'Ｒ' , 'Ｓ' , 'Ｔ' ,
            'Ｕ' , 'Ｖ' , 'Ｗ' , 'Ｘ' , 'Ｙ' ,
            'Ｚ' , 'ａ' , 'ｂ' , 'ｃ' , 'ｄ' ,
            'ｅ' , 'ｆ' , 'ｇ' , 'ｈ' , 'ｉ' ,
            'ｊ' , 'ｋ' , 'ｌ' , 'ｍ' , 'ｎ' ,
            'ｏ' , 'ｐ' , 'ｑ' , 'ｒ' , 'ｓ' ,
            'ｔ' , 'ｕ' , 'ｖ' , 'ｗ' , 'ｘ' ,
            'ｙ' , 'ｚ' , '－' , '　' , '：' ,
            '．' , '，' , '／' , '％' , '＃' ,
            '！' , '＠' , '＆' , '（' , '）' ,
            '＜' , '＞' , '＂' , '＇' , '？' ,
            '［' , '］' , '｛' , '｝' , '＼' ,
            '｜' , '＋' , '＝' , '＿' , '＾' ,
            '￥' , '￣' , '｀'
            );
            $sbc = array( //半形
            '0', '1', '2', '3', '4',
            '5', '6', '7', '8', '9',
            'A', 'B', 'C', 'D', 'E',
            'F', 'G', 'H', 'I', 'J',
            'K', 'L', 'M', 'N', 'O',
            'P', 'Q', 'R', 'S', 'T',
            'U', 'V', 'W', 'X', 'Y',
            'Z', 'a', 'b', 'c', 'd',
            'e', 'f', 'g', 'h', 'i',
            'j', 'k', 'l', 'm', 'n',
            'o', 'p', 'q', 'r', 's',
            't', 'u', 'v', 'w', 'x',
            'y', 'z', '-', ' ', ':',
            '.', ',', '/', '%', ' #',
            '!', '@', '&', '(', ')',
            '<', '>', '"', '\'','?',
            '[', ']', '{', '}', '\\',
            '|', ' ', '=', '_', '^',
            '￥','~', '`'
            );

       if($request->input('key')=="")
            $key="";
       else
            $key=str_replace($dbc, $sbc,$request->input('key'));

       if($request->input('pg')=="")
            $pg=1;
       else
            $pg=$request->input('pg');

       if($request->input('view')=="")
            $view=10;
       else
            $view=$request->input('view');

       if($request->input('desc')=="")
            $desc='asc';
       else
            $desc=$request->input('desc');

       if($request->input('orderby')=="")
            $orderby="created_at";
       else
            $orderby=$request->input('orderby');

        $num=(($pg-1)*$view);

        $new_s=htmlspecialchars($key,ENT_QUOTES);

        $product=Product::whereRaw('cast(created_at as char) like "%'.$new_s.'%"')
                     ->orwhere('name','like','%'.$key.'%');

        $product_num=$product->get();

        $views=$product->orderBy($orderby,$desc)
                        ->skip($num)->take($view)->get();

        $count=$product_num->count();

        return View('backend.product.index',[
            'no'=>1,
            'title'=>'商品管理平台-首頁',
            'now'=>'product',
            'count'=>$count,
            'list'=>$views,
            'sort'=>$desc,
            'key'=>$key,
            'orderby'=>$orderby,
            'pg'=>$pg,
            'view'=>$view,
            'num'=>$num,
            'search'=>'',
        ]);
    }

    public function create()
    {
          return View('backend.product.create',[
               'no'=>1,
               'key'=>'此分頁沒有查詢功能',
               'now'=>'product',
               'title'=>'商品管理平台-新增資料',
               'search'=>'disabled="disabled"',
          ]);

    }

    public function add(request $request)
    {
          $product=new Product();

          $path=public_path().'/images/product/'; //定義檔案上傳位址

          $upload_file=$request->file('cover7');

          if($request->url=='')
          {
               $this->validate($request,[
                    'Name'=>'required|',//.Rule::unique('glory','gloryname')->where('deleted_at','NULL'),
                    'o_price'=>'required',
                    'price'=>'required',
                    'url'=>'nullable|url',
                    'cover7'=>'required|between:0,1024|mimes:jpeg,jpg,png,gif' //限定上傳大小及格式
               ]);
     
               if($request->hasfile('cover7') &&$upload_file->isValid())
               {
                    $newname='img'.uniqid().'.'.$request->file('cover7')->getClientOriginalExtension(); //重新命名
     
                    $upload_file->move($path,$newname); //上傳檔案
     
                    $product->picture='public/images/product/'.$newname;
               }     
          }else
          {
               $this->validate($request,[
                    'Name'=>'required|',//.Rule::unique('glory','gloryname')->where('deleted_at','NULL'),
                    'o_price'=>'numeric|required',
                    'price'=>'nullable|numeric',
                    'url'=>'required|url',
                    'cover7'=>'between:0,1024|mimes:jpeg,jpg,png,gif' //限定上傳大小及格式
               ]);
     
               $product->picture=$request->url;
          }

          $product->name=$request->Name;
          $product->price=$request->o_price;
          $product->sPrice=$request->price;
          $product->save();

          switch($request->input('method'))
          {
               case 0:
                   return redirect('/backend/create');
               break;
               case 1:
                    return redirect('/backend');
               break;
               case 2:
                    return redirect('/backend/edit/'.$product->id);
               break;
          }

    }

    public function edit($id)
    {
         $product=Product::find($id);
          return View('backend.product.edit',[
               'no'=>1,
               'key'=>'此分頁沒有查詢功能',
               'now'=>'product',
               'title'=>'商品管理平台-新增資料',
               'search'=>'disabled="disabled"',
               'product'=>$product,
          ]);

    }

    public function update(request $request,$id)
    {
          $product=Product::find($id);

          $path=public_path().'/images/product/'; //定義檔案上傳位址

          $upload_file=$request->file('cover7');

          if($request->url=='' and $product->picture=='')
          {
               $this->validate($request,[
                    'Name'=>'required|',//.Rule::unique('glory','gloryname')->where('deleted_at','NULL'),
                    'o_price'=>'required',
                    'price'=>'required',
                    'url'=>'nullable|url',
                    'cover7'=>'between:0,1024|mimes:jpeg,jpg,png,gif' //限定上傳大小及格式
               ]);

               if($request->hasfile('cover7') &&$upload_file->isValid())
               {
                    $newname='img'.uniqid().'.'.$request->file('cover7')->getClientOriginalExtension(); //重新命名

                    $upload_file->move($path,$newname); //上傳檔案

                    $product->picture='public/images/product/'.$newname;
               }     
          }else if($request->url != '')
          {
               $this->validate($request,[
                    'Name'=>'required|',//.Rule::unique('glory','gloryname')->where('deleted_at','NULL'),
                    'o_price'=>'numeric|required',
                    'price'=>'nullable|numeric',
                    'url'=>'url',
                    'cover7'=>'between:0,1024|mimes:jpeg,jpg,png,gif' //限定上傳大小及格式
               ]);

               $product->picture=$request->url;

          }else
          {
          }

          $product->name=$request->Name;
          $product->price=$request->o_price;
          $product->sPrice=$request->price;
          $product->touch();

          switch($request->input('method'))
          {
               case 0:
                    return redirect('/backend/create');
               break;
               case 1:
                    return redirect('/backend');
               break;
               case 2:
                    return redirect('/backend/edit/'.$product->id);
               break;
          }

    }

    public function delete(Request $request)
    {
         $product=Product::find($request->id);
         $product->delete();
    }

    public function frontend()
    {

         $views=Product::orderBy('created_at','desc')->get();

         return View('frontend.index',[
              'product'=>$views,
         ]);
    }
}
