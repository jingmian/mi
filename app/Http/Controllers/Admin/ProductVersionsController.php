<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Product;
use App\Entity\ProductVersions;
use App\Entity\ProductColor;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\HtmlString;
use App\Http\Requests\Admin\ProductVersionsRequest;
use App\Http\Controllers\Controller;

class ProductVersionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if( empty($id) ){
            return redirect('/admin/product');
        }
        $verList = new ProductVersions;
        $verList->color;
        $verList = $verList::where('p_id',$id)->paginate(10);

        return view('admin.product.versions.index',compact('verList','id'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {

        $p_id = $id?$id:$request->id;
        if( empty($p_id)) {
            return redirect('/admin/product');
        }
        $colorList = ProductColor::all();
        $status = ['在售','下架','预购','缺货','新品上市'];
        return view('admin.product.versions.create',compact('colorList','status','p_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductVersionsRequest $request)
    {
        $data['p_id'] = $request->p_id;
        $data['ver_id'] = (time()/100).rand(00,99);
        $data['ver_name'] = $request->ver_name;
        $data['ver_spec'] = $request->ver_spec;
        $data['ver_desc'] = $request->ver_desc;
        $data['price'] = $request->price;
        $data['contact_p_num'] = $request->contact_p_num;
        $data['store'] = $request->store;
        $data['status'] = $request->status;
        if( $request->ver_img ){
            $data['ver_img'] = json_encode($request->ver_img);
        }else{
            $data['ver_img'] = NULL;
        }

        if( $request->color ){
            $color = array_keys($request->color);
            $data['color_id'] = json_encode($color);
        }else{
            $data['color_id'] = NULL;
        }
        $res = ProductVersions::create($data);

        if( $res ){
            $return['status'] = 0;
        }else{
            $return['status'] = 1;
        }
        return response()->json($return);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = ProductVersions::find($id);
        $color = $info->color_id;
        $imgs = $info->ver_img;
        $imgs = json_decode($imgs,true);
        $color = json_decode($color,true);
        //获取imgs 数量
        $imgsNum = count($imgs);
        $zhStatus = ['在售','下架','预购','缺货','新品上市'];
        $colorList = ProductColor::all();
        return view('admin.product.versions.edit',compact('info','color', 'imgsNum', 'imgs','zhStatus','colorList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data['ver_name'] = $request->ver_name;
        $data['ver_spec'] = $request->ver_spec;
        $data['ver_desc'] = $request->ver_desc;
        $data['price'] = $request->price;
        $data['contact_p_num'] = $request->contact_p_num;
        $data['store'] = $request->store;
        $data['status'] = $request->status;
        if( $request->ver_img ){
            $imgs = $request->ver_img;
            $data['ver_img'] = json_encode($imgs);
        }else{
            $data['ver_img'] = NULL;
        }

        if( $request->color ){
            $color = array_keys($request->color);
            $data['color_id'] = json_encode($color);
        }else{
            $data['color_id'] = NULL;
        }

        $res = ProductVersions::find($id)->update($data);
        return $res?0:1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //获取删除版本的信息
        $version = ProductVersions::find($id);
        //获取版本图片地址
        $paths = $version->ver_img;

        if( $paths ){
            //存在则删除
            //先转为数组
            $pathArr = json_decode($paths, true);
            foreach( $pathArr as $path ){
                Storage::delete($path);
            }
        }
        $res = $version->delete();
        return $res?0:1;

    }

    /*
     *
     * 获取颜色列表
     *
     */
    public function getColorList(Request $request)
    {
        //接收传递的已选中的颜色id
        $colorArr = $request->colorArr?$request->colorArr:null;
        $str = '';
        if( $colorArr ){
            //拿出所有颜色数据
            $list = ProductColor::all();
            //组装数据
            foreach( $list as $v ){
                if( in_array($v->id,$colorArr) ){
                    $str .= '<input type="checkbox" name="color['.$v->id.']" data-id="'.$v->id.'" title="'.$v->color_name.'" checked> ';
                }else{
                    $str .= '<input type="checkbox" name="color['.$v->id.']" data-id="'.$v->id.'" title="' .$v->color_name.'"> ';
                }
            }
        }else{
            $list = ProductColor::all();
            foreach( $list as $v ){
                $str .= '<input type="checkbox" name="color['.$v->id.']" data-id="'.$v->id.'" title="' .$v->color_name.'"> ';
            }
        }
        $str .= '<a id="colorAdd" class="layui-btn layui-btn-small"  style="margin:5px 0">添加颜色</a>';

        $str = new HtmlString($str);
        return $str;
    }
}