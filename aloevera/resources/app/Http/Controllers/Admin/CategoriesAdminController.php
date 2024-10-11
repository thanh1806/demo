<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\Categories;
use App\Repositories\Handle\HandleInterface;
use App\Repositories\Category\CategoryInterface;

class CategoriesAdminController extends Controller
{
    protected $categoryRepo;
    protected $handleRepo;

    public function __construct(CategoryInterface $categoryRepo, HandleInterface $handleRepo){
        $this->categoryRepo = $categoryRepo;
        $this->handleRepo = $handleRepo;
    }

     public function index(){
        $data =  $this->categoryRepo->getCategory();
        $count = count($data);
        for($i = 0; $i < $count; $i++){
            //số thứ tự hiển thị
            $data[$i]['stt'] = $i + 1;
            //
            $data[$i]['id_new'] = $this->handleRepo->id_encode($data[$i]['id']);
        }
        return view('admin.Categories.index')->with('data',$data);
    }
    public function index_add(){
      
        return view('admin.Categories.addCategories');
    }
    public function add_post(Request $request){
        $attributes = [
            'name'=>$request->name,
            'active'=>1
        ];
       $created = $this->categoryRepo->create($attributes);
   
        if($created){
            return redirect()->route('admin.categories')->with('success','Thêm thành công.');
        }
        else{
            return redirect()->route('admin.categories.add')->with('error','Thêm thất bại.');
        }
        
        
    }
    public function index_edit($id){
        $data = $this->categoryRepo->find($id);
       // dd($data);die;
        return view('admin.Categories.editCategories')->with('data',$data);
    }
    public function edit_post(Request $request){
        $id = $request->id;
        // $data = $this->categoryRepo->find($id);
        
        //  dd($request->name);die;
        $attributes = [
            'name'=>$request->name
        ];
        $update = $this->categoryRepo->update($id,$attributes);
        
         
        if($update){
            return redirect()->route('admin.categories.edit',['id'=>$id])->with('success','Sửa đổi thành công.');
        }
        else{
            return redirect()->route('admin.categories.edit')->with('error','Sửa đổi thất bại.');
        }
    }
    public function delete(Request $request){
        // $id = $request->id;
           //giải hóa id
         
        $id = $this->handleRepo->id_decode($request->id);
        $data = $this->categoryRepo->delete($id);
        
        if($data){
            return redirect()->route('admin.categories')->with('success','Xóa thành công.');
        }
        else{
            return redirect()->route('admin.categories')->with('error','Xóa thất bại.');
        }


    }
}
