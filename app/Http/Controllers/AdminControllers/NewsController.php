<?php


namespace App\Http\Controllers\AdminControllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\Categories;
use App\Models\News;
use function GuzzleHttp\Promise\settle;

class NewsController extends Controller
{
//    $blade_path = 'admin.news';

    public function index(){
        $news = News::all();

        return view('admin.news.news')->with('news' , $news);
    }


    public function create(){
        $categories = Categories::all();
        return view('admin.news.create')->with('categories' , $categories);
    }


    public function store(NewsRequest $request){
        $request['published'] = $request['published']?true : false ;
        News::create($request->all());
        session()->flash('msg' , 's: news created successfully');
        return redirect(route('news.index'));
    }


    public function destroy($id){
        if (!News::find($id)){
            session()->flash('msg' , 'w: news not exist');
            return redirect(route('news.index'));
        }
        News::where('id' , $id)->delete();
        session()->flash('msg' , 's: deleted successfully');
        return redirect(route('news.index'));
    }

    public function edit($id){
        $new = News::find($id);
        $categories = Categories::all();
        return view('admin.news.edit')->with('item' , $new)->with('categories' , $categories );
    }


    public function update($id , NewsRequest $request){
        $new = News::find($id) ;
        if (!$new){
            session()->flash('msg' , 'w: news not exist');
            return redirect(route('news.index'));
        }
        $request['published'] = $request['published']? true : false ;
        $new->update($request->all());
        session()->flash('msg' , 's: updated successfully');
        return redirect(route('news.index'));
    }
    public  function show($id){
        $news = News::find($id) ;
        $categories = Categories::all();
        return view('admin.news.new')->with('news' , $news)->with('categories' , $categories );
    }
}
