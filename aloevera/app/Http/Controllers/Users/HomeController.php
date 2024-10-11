<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductInterface;
use App\Repositories\Category\CategoryInterface;
use App\Repositories\Handle\HandleInterface;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    protected $productRepo;
    protected $categoryRepo;
    protected $handleRepo;

    public function __construct(CategoryInterface $categoryRepo, ProductInterface $productRepo, HandleInterface $handleRepo) {
        $this->productRepo = $productRepo;
        $this->handleRepo = $handleRepo;
        $this->categoryRepo = $categoryRepo;
    }
    public function index()
    {
        //lấy dữ liệu categories cho header
        $cate = $this->categoryRepo->getCategories();
      
        for($j = 0; $j < count($cate); $j++){
            
            $cate[$j]['id_new'] = $this->handleRepo->id_encode($cate[$j]['id']);
          
        }
        

        //end
        $product = $this->productRepo->getProduct();
        $count = count($product);
        $flag = 1;
        for($i = 0; $i < $count; $i++){
          
            // xử lý thêm class fix vào item
            $product[$i]['fix'] = '';
            if($flag % 3 == 0 )
            {
                $product[$i]['fix'] = 'fix';
            }
             // xử lý thêm class fixmobile vào item
             $product[$i]['fixmobile'] = '';
             if($flag % 2 == 0 )
             {
                 $product[$i]['fixmobile'] = 'fixmobile';
             }
             
            // 
           $link = Str::slug($product[$i]['name_product']);
            // 
            $product[$i]['id_new'] =$link .'-'. $this->handleRepo->id_encode($product[$i]['id']);
        
            //chuyển chuỗi thành mảng 
            $product[$i]['images'] = json_decode($product[$i]['images']);
            //tính % giảm giá
            $product[$i]['sale'] = floor(((($product[$i]['price'])-($product[$i]['discount']))/($product[$i]['price'])) *100); 
            // chuyển đổi tiền tệ
             $product[$i]['price'] = number_format($product[$i]['price']);
             $product[$i]['discount'] = number_format($product[$i]['discount']);
            // Hiển thị mô tả ngắn gọn cho trang sản phẩm
            $product[$i]['name_product'] = Str::of($product[$i]['name_product'])->toHtmlString();
            $product[$i]['name_product2'] = Str::of($product[$i]['name_product2'])->toHtmlString();
            
            $flag++;
        }
        //mã hóa id
       
       
        // dd($product);
        return view('users.Home.home')->with('data_product',$product)
                                      ->with('cate',$cate);
    }
        public function chinh_sach_index()
    {
        
        //lấy dữ liệu categories cho header
        $cate = $this->categoryRepo->getCategories();
      
        for($j = 0; $j < count($cate); $j++){
            
            $cate[$j]['id_new'] = $this->handleRepo->id_encode($cate[$j]['id']);
          
        }
        

        //end
        // dd($product);
        return view('users.chinhsach.chinhsach')->with('cate',$cate);
    }

    public function tin_tuc_index()
    {
        
        //lấy dữ liệu categories cho header
        $cate = $this->categoryRepo->getCategories();
      
        for($j = 0; $j < count($cate); $j++){
            
            $cate[$j]['id_new'] = $this->handleRepo->id_encode($cate[$j]['id']);
          
        }
        

        //end
        // dd($product);
        return view('users.tintuc.tintuc')->with('cate',$cate);
    }
    public function tuan_thanh_index()
    {
        
        //lấy dữ liệu categories cho header
        $cate = $this->categoryRepo->getCategories();
      
        for($j = 0; $j < count($cate); $j++){
            
            $cate[$j]['id_new'] = $this->handleRepo->id_encode($cate[$j]['id']);
          
        }
        

        //end
        // dd($product);
        return view('users.tuanthanh.tuanthanh')->with('cate',$cate);
    }
    public function cart_index()
    {
        
        //lấy dữ liệu categories cho header
        $cate = $this->categoryRepo->getCategories();
      
        for($j = 0; $j < count($cate); $j++){
            
            $cate[$j]['id_new'] = $this->handleRepo->id_encode($cate[$j]['id']);
          
        }
        

        //end
        // dd($product);
        return view('users.cart.cart')->with('cate',$cate);
    }
   
   
}
