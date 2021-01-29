<?php

namespace App\Http\Controllers\Portal\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $newss = News::all();
        return view('portal.admin.news' ,compact('newss'));
    }

    public function create_news(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'image' => ['required', 'image', 'mimes:jpeg,png']
        ]);

        if($validator->fails()):
            return response()->json(['errors'=>$validator->errors()]);
        else:
            $news = new News();
            $file_ext = $request->file('image')->getClientOriginalExtension();
            $file_name = 'news_'.date('Y-m-d').'_'.time().'.'. $file_ext;
            $news->image=$file_name;
            if($path = $request->file('image')->storeAs('public/news/',$file_name)):
                if($news->save()):
                    return response()->json(['success'=>'success']);
                endif;
            endif;
        endif;
        return response()->json(['error'=>'error']);
    }

    public function delete_news(Request $request)
    {
        $image_name = News::where('id', $request->id )->first()->image;

        if(News::where('id', $request->id )->delete() && Storage::delete('public/news/'.$image_name)):
            return response()->json(['success'=>'success']);
        endif;
        return response()->json(['error'=>'error']);
    }
}
