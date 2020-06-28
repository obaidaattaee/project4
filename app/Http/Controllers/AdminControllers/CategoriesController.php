<?php


namespace App\Http\Controllers\AdminControllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Categories;
use App\Models\News;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Categories::get();
        $news = News::get();


        return view('admin.category.categories')->with('categories' , $categories)->with('news' , $news);
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(CategoryRequest $request){
        $request['show'] = $request['show']?true :false;

        Categories::create($request->all());
        session()->flash('msg' , 's: category created succesfully');
        return redirect(route('category.index'));
    }
    public function destroy($id){
        if (!Categories::find($id)){
            session()->flash('msg' , 'w: category not exist');
            return redirect(route('category.index'));
        }
        Categories::where('id' , $id)->delete();
        session()->flash('msg' , 's: category deleted successfuly');
        return redirect(route('category.index'));
    }
    public function edit($id){
        $category = Categories::find($id);
        if (!$category){
            session()->flash('msg' , 'w: category not exist');
            return redirect(route('category.index'));
        }
        return view('admin.category.edit' )->with('category' , $category);
    }

    public function update($id , CategoryRequest $request){
        $request['show'] = $request['show']?true : false ;
        $country = Categories::find($id);

        if (!$country){
            session()->flash('msg' , 'w: category not exist');
            return redirect(route('category.index'));
        }
        else{
            $country->update($request->all());
            session()->flash('msg' , 's: update successfully');
            return redirect(route('category.index'));
        }


    }
    public function show($id){
        $category = Categories::find($id) ;
        if (!$category){
            session()->flash('msg' , 'w: category not exist');
            return redirect(route('category.index'));
        }
        return view('admin.category.category')->with('category' , $category);
    }
}
