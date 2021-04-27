<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $search=$request->input('search');
        $category=$request->input('category_id');
        $sort=explode('/',$request->input('sort'));
        if (is_null($search)&&$category=='0'){
            $ads=Ad::query()
                ->orderBy($sort[0],$sort[1])
                ->paginate(15);
        }elseif (is_null($search)&&$category!=='0')
       {
            $ads=Ad::query()
                ->where('category_id','=',$category)
                ->orderBy($sort[0],$sort[1])
                ->paginate(15);
        }elseif(!is_null($search)&&$category=='0'){
            $ads=Ad::query()
                ->where('title','LIKE',"%{$search}%")
                ->orderBy($sort[0],$sort[1])
                ->paginate(15);
        }else{
            $ads=Ad::query()
                ->where('title','LIKE',"%{$search}%")
                ->where('category_id','=',$category)
                ->orderBy($sort[0],$sort[1])
                ->paginate(15);
        }
        $ads->appends(['search'=>$search,'category_id'=>$category]);
        return view('pages/ad',['category'=>Category::all(),'ads'=>$ads]);

    }
}
