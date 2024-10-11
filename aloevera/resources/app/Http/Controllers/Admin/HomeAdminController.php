<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductInterface;
use App\Repositories\Category\CategoryInterface;
use App\Repositories\Handle\HandleInterface;
use Illuminate\Support\Str;

class HomeAdminController extends Controller
{
    protected $productRepo ;
    protected $categoryRepo ;
    protected $handleRepo;

    public function __construct(ProductInterface $productRepo, CategoryInterface $categoryRepo, HandleInterface $handleRepo){
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
        $this->handleRepo = $handleRepo;
    }
    public function index(){
        $data = $this->productRepo->getProduct();
        $count = count($data);
        for($i = 0; $i < $count; $i++){
        //số thứ tự hiển thị
        $data[$i]['stt'] = $i + 1;
        //

        //Mã hóa id
        $data[$i]['id_new'] = $this->handleRepo->id_encode($data[$i]['id']); 
        //Chuyển đổi tiền tệ
        //lấy danh sách hình ảnh
        $data[$i]['images'] = json_decode($data[$i]['images']);; 
        // 
        $data[$i]['price'] = $this->handleRepo->currency_format($data[$i]['price']);
        // Chuyển chuỗi thành html
        $data[$i]['description'] = Str::of($data[$i]['description'])->toHtmlString();


        }
       
        return view('admin.Products.index')->with('product_data',$data);
    }
    public function index_add(){
        $data = $this->categoryRepo->getCategory();
        return view('admin.Products.addProduct')->with('data',$data);
    }
    public function add_post(Request $request){
        
        $files = [];
        $files_upload = $request->files;
      
        if($request->hasfile('files'))
		{

			foreach($request->file('files') as $file)
			{  
               
                $original_filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName =$this->handleRepo->urlNormal($original_filename);
			    $name = time().$fileName.'-'.rand(1,100).'.'.$file->getClientOriginalExtension();
                
			    $file->move(public_path('upload/images'), $name);  
			    $files[] = $name;  
			}
		}
        //chuyển đổi array to json
        $json_files = json_encode($files);

        // dd($json_files);die;
       //End xử lý
        $attributes = [
            'cate_id'=>$request->category,
            'name_product'=>$request->name_product,
            'price'=>$request->price,
            'description_most'=>$request->description_most,
            'description'=>$request->description,
            
            'active'=>1,
            //xử lý ảnh 
            'images'=>$json_files,
        ];
       $created = $this->productRepo->create($attributes);
        
        if($created){
            return redirect()->route('admin.product')->with('success','Thêm thành công.');
        }
        else{
            return redirect()->route('admin.product.add')->with('error','Thêm thất bại.');
        }
        
        
    }
    
    public function index_edit($id){
        //giải hóa id
        $id = $this->handleRepo->id_decode($id);
        $data = $this->productRepo->find($id);
        $category = $this->categoryRepo->getCategory();
        
        //tạo mảng và thêm thành phần cate in product vào mảng
        $selected_cate = [];
        for($i = 0; $i < count($category); $i++){
            if($data['cate_id'] == $category[$i]['id']){
                $selected_cate['selected_id'] = $category[$i]['id']; 
                $selected_cate['selected_name'] = $category[$i]['name']; 
                //xóa thành phần đã chọn trong product ở mảng category
                unset($category[$i]);
            }

        }
        //end
        $data['images'] = json_decode($data['images']); 
        
        $data['newid'] = $this->handleRepo->id_encode($id);
       
        
       
        return view('admin.Products.editProduct')
        ->with('data',$data)
        ->with('category',$category)
        ->with('selected_cate',$selected_cate);

    }
    public function edit_post(Request $request){
        //dd($request->all());
        $id = $this->handleRepo->id_decode($request->id);
        $data = $this->productRepo->find($id);
       //lấy file upload
        $files = [];
        $files_upload = $request->files;
      
        if($request->hasfile('files'))
		{

			foreach($request->file('files') as $file)
			{  
               
                $original_filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName =$this->handleRepo->urlNormal($original_filename);
			    $name = time().$fileName.'-'.rand(1,100).'.'.$file->getClientOriginalExtension();
                
			    $file->move(public_path('upload/images'), $name);  
			    $files[] = $name;  
			}
		}
        if($request->images_uploaded === null)
        {
            $request->images_uploaded = [];
        };
        $files_merge = array_merge($files,$request->images_uploaded);
       
     
            $json_files = json_encode($files_merge);
        
        //chuyển đổi array to json
   
        

        
        //   dd($request->description_most);die;
        $attributes = [
            'id' => $id,
            'cate_id' => $request->category,
            'name_product' => $request->name_product,
            'description_most' => $request->description_most,
            'description' => $request->description,
            'price' => $request->price,
            'images' => $json_files
        ];

      
        $update = $this->productRepo->update($id,$attributes);
        // dd($this->handleRepo->id_decode($request->id));die;
         
        if($update){
            return redirect()->route('admin.product')->with('success','Sửa đổi thành công.');
        }
        else{
            return redirect()->route('admin.product')->with('error','Sửa đổi thất bại.');
        }
    }
    public function delete(Request $request){
          //giải hóa id
         
        $id = $this->handleRepo->id_decode($request->id);
       
        
        $data = $this->productRepo->delete($id);
     
        
        if($data){
            return redirect()->route('admin.product')->with('success','Xóa thành công.');
        }
        else{
            return redirect()->route('admin.product')->with('error','Xóa thất bại.');
        }


    }
}
