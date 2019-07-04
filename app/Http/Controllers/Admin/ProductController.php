<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Collection;
use App\Models\Product;
use App\Models\Choose;
use App\Models\District;
use App\Models\ImageDetail;
use Intervention\Image\Facades\Image;
use App\Models\Active;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;
use Validator,Redirect,Response,File;
use Helpers;

class ProductController extends Controller
{   

   public function __construct(Status $objStatus, Collection $objCollection, Choose $objChoose, District $objDistrict, Product $objProduct, Active $objActive){
        $this->objCollection = $objCollection;
        $this->objChoose     = $objChoose;
        $this->objDistrict   = $objDistrict;
        $this->objProduct    = $objProduct;
        $this->objActive     = $objActive;
        $this->objStatus     = $objStatus;
    }

    public function index() {
        $objProduct = Product::get();
    	return view('admin.product.index',compact('objProduct'));
    }

    public function get_Add() {
        $objChoose          = $this->objChoose->get_Choose();
        $objCollection      = $this->objCollection->get_Collection();
        $objDistrict        = $this->objDistrict->get_District();
        $objActive          = $this->objActive ->get_Active();
        $objStatus          = $this->objStatus ->get_Status();
        return view('admin.product.add',compact('objCollection','objChoose','objDistrict','objActive','objStatus'));
    }

    public function post_Add(ProductRequest $request) {

        $file = $request->file('image_detail123');
        if(!is_null($file)){
            $fileName = $this->image_detail123 = time() . "_" . rand(5, 5000000).'_'. $request->image_detail123->getClientOriginalName();
            $request->fileName = $fileName;
        } else {
            $request->fileName = '';
        }

        $images = $request->file('image_detail');
        try {
            if($this->objProduct->add_Items($request)) {
                if($fileName <> ''){
                    $file->move('storage/app/public/files/show_image',$fileName);
                }
            $images = $request->file('image_detail');
            if($images){
                $id =DB::getPdo()->lastInsertId();
                foreach ($images as $image){
                    $name = time() . "_" . rand(5, 5000000).'_'. $image->getClientOriginalName();  
                    $url = "storage/app/public/files/detail_image";
                    $image->move('storage/app/public/files/detail_image',$name);
                    Helpers::watermark_detail($image,$name,$url);
                    ImageDetail::create([
                        'image_detail'  => $name,
                        'product_id'    => $id,
                    ]);
                   
                }
            }
                DB::commit();
                $request->session()->flash('msg','Thêm thành công');
                return redirect()->route('admin.product.index');
            }
        } catch(\Exception $e) {
            $request->session()->flash('msg','Thêm thất bại');
            return redirect()->route('admin.product.add');
        }


        if($this->objProduct->add_Items($request)) {
            $file->move('storage/app/public/files/show_image',$fileName);
            $images = $request->file('image_detail');
            if($images){
                $id =DB::getPdo()->lastInsertId();
                foreach ($images as $image){
                    $name = time() . "_" . rand(5, 5000000).'_'. $image->getClientOriginalName();  
                    $url = "storage/app/public/files/detail_image";
                    $image->move('storage/app/public/files/detail_image',$name);
                    Helpers::watermark_detail($image,$name,$url);
                    ImageDetail::create([
                        'image_detail'  => $name,
                        'product_id'    => $id,
                    ]);
                   
                }
            }

            DB::commit();
            $request->session()->flash('msg','Thêm thành công');
            return redirect()->route('admin.product.index');
        } else {
            $request->session()->flash('msg','Thêm thất bại');
            return redirect()->route('admin.product.add');
        }
    }

    public function post_Delete(Request $request ){
        try {

            $Image        = Product::where('id', $request->input('id'))->first();
            $patch_name   = 'storage/app/public/files/show_image/'.$Image['image'];
            File::delete($patch_name);

            $Image_name_  = ImageDetail::where('product_id', $request->input('id'))->get();
            foreach ($Image_name_ as $value) {
                $patch = 'storage/app/public/files/detail_image/'.$value->image_detail;
                File::delete($patch);
            } 
            $Product        = Product::where('id', $request->input('id'))->delete();
            $Image_Product  = ImageDetail::where('product_id', $request->input('id'))->delete();
            return response()->json(['success'=> 'Xóa thành công!']);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['error'=> 'Xóa thất bại!']);
        }
    }

    public function get_Edit(Request $request,$id) {
        $objChoose          = $this->objChoose->get_Choose();
        $objCollection      = $this->objCollection->get_Collection();
        $objDistrict        = $this->objDistrict->get_District();
        $objActive          = $this->objActive ->get_Active();
        $objStatus          = $this->objStatus ->get_Status();
        $objProduct         = Product::findOrfail($id);
        $ImageProduct       = ImageDetail::where('product_id',$id)->get();
        return view("admin.product.edit",compact('objCollection','objChoose','objDistrict','objActive','objStatus','objProduct','ImageProduct'));
    }

    public function post_Edit($id, ProductRequest $request) {
        $data = $request->all();
        $value                         = $data['configuration'];
        $configuration                 = json_encode($value);
        $data['configuration']         = $configuration;

        try{
            DB::beginTransaction();
            $images_del = $request->id_del_image;
            $product    = Product::findOrFail($id);
            /// Xóa ảnh chi tiết
            if(!empty($images_del)){
                $array_img = explode(',',$images_del);
                foreach($array_img as $id_del){
                    $img  = ImageDetail::find($id_del);
                    $path = $_SERVER["DOCUMENT_ROOT"].'/storage/app/public/files/detail_image/'.$img->image_detail;
                    if(file_exists($path)){
                        unlink($path);
                    }
                    $img->delete();
                }
            }

            // Ảnh đại điện
            $images123 = $request->file('image_detail123');
            if($images123) {
                $name123 = $request->fileName  = 'avatar_'.time() . "_" .rand(5, 5000000).'_'. $images123->getClientOriginalName();
                $images123->move('storage/app/public/files/show_image',$name123);
            } else {
                $request->fileName = $product['image'];
            }

            /// Thêm ảnh mô tả
            $images = $request->file('image_detail');
            if($images){
                foreach ($images as $image){
                    $name = time() . "_" . rand(5, 5000000).'_'. $image->getClientOriginalName();
                    $url = "storage/app/public/files/detail_image";

                    $image->move('storage/app/public/files/detail_image',$name);
                    Helpers::watermark_detail($image,$name,$url);

                    ImageDetail::create([
                        'image_detail'  => $name,
                        'product_id'    => $id,
                    ]);
                }
            }
            $objProduct                    = new Product();
            $objItem                       = $objProduct->findOrfail($id);
            $objItem->name                 = $data['name'];
            $objItem->detail               = $data['detail'];
            $objItem->content              = $data['description'];
            $objItem->price                = $data['price'];
            $objItem->choose_id            = $data['choose_id'];
            $objItem->status_id            = $data['status_id'];
            $objItem->collection_id        = $data['collection_id'];
            $objItem->district_id          = $data['district_id'];
            $objItem->users_id             = 1;
            $objItem->address              = $data['address'];
            $objItem->configuration        = $configuration;
            $objItem->bedrooms             = $data['bedrooms'];
            $objItem->bathrooms            = $data['bathrooms'];
            $objItem->sqrt                 = $data['sqrt'];
            $objItem->active_id            = $data['active'];
            $objItem->image                = $request->fileName;
            
            if($objItem->save()){
                if($images123){
                    $oldimage123 = $_SERVER["DOCUMENT_ROOT"]. '/storage/app/public/files/show_image/'.$product['image'];
                    if(file_exists($oldimage123)) {
                        unlink($oldimage123);
                    }
                }
                DB::commit();
                $request->session()->flash('msg','Sửa thành công');
                return redirect()->route('admin.product.index');
            }
        } catch(\Exception $e) {
            DB::rollback();
            $request->session()->flash('msg','Sửa thất bại');
            return redirect()->route('admin.product.edit',$id);
        }
    }

}
