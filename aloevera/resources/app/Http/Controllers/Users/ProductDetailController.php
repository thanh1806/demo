<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductInterface;
use App\Repositories\Category\CategoryInterface;
use App\Repositories\Handle\HandleInterface;
use Illuminate\Support\Str;


class ProductDetailController extends Controller
{
    protected $productRepo;
    protected $categoryRepo;
    protected $handleRepo;

    public function __construct(CategoryInterface $categoryRepo, ProductInterface $productRepo, HandleInterface $handleRepo) {
        $this->productRepo = $productRepo;
        $this->handleRepo = $handleRepo;
        $this->categoryRepo = $categoryRepo;
    }
    // public function detail_product(Request $request)
    // {   
    //     //dd($request['data']['id']);
    //     //lấy dữ liệu categories cho header
    //           $cate = $this->categoryRepo->getCategories();
              
    //         for($j = 0; $j < count($cate); $j++){
                
    //             $cate[$j]['id_new'] = $this->handleRepo->id_encode($cate[$j]['id']);
              
    //         }
    //         //end
            
    //         $id = $request['data']['id']; 
    //         //giải hóa id
    //         $id = $this->handleRepo->id_decode($id);
    //         //
    //         $product = $this->productRepo->find($id);
    //         //Chuyển đổi tiền tệ
    //         $product['price'] = $this->handleRepo->currency_format($product['price']);
    //         // xử lí hiển thị hình ảnh từ json về dạng mảng
    //         $product['images'] = json_decode($product['images']);
    //         $product['description'] = Str::of($product['description'])->toHtmlString();

    //     return view('users.ProductDetail.detail')->with('product',$product)->with('cate',$cate);
    // }

    public function detail_product($id)
    {
          //lấy dữ liệu categories cho header
          $cate = $this->categoryRepo->getCategories();
          
        for($j = 0; $j < count($cate); $j++){
            
            $cate[$j]['id_new'] = $this->handleRepo->id_encode($cate[$j]['id']);
          
        }
          //end
        $arr_id = explode('-',$id);
      
        //giải hóa id
        $id = $this->handleRepo->id_decode(end($arr_id));
        //
        $product = $this->productRepo->find($id);
         //Chuyển đổi tiền tệ
         $product['price'] = $this->handleRepo->currency_format($product['price']);
        // xử lí hiển thị hình ảnh từ json về dạng mảng
        $product['images'] = json_decode($product['images']);
        $product['description'] = Str::of($product['description'])->toHtmlString();
        
        return view('users.ProductDetail.detail')->with('product',$product)->with('cate',$cate);
    }
}
