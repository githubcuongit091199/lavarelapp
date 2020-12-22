<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Article;
use App\Models\Profile;
use App\Models\User;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles =  Article::all()->sortByDesc('created_at');
        // foreach($articles as $a){
        //     dd($a->user->name);
        // }
        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,User $user)
    {
        Article::create([
            'user_id' => $user->id,
            'body' => $request->body,
            'title' => 0
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $tags = $article->tags;

        $user = $article->user;

        $profile = $user->profile;
        return view('article-tags.show',compact('tags','user','profile','article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article,Tag $tag)
    {

        $article->delete();
        $article->tags()->detach($tag->id);
        return redirect()->back()->with('message','Delete cart complete!!!');
    }
    public function indexShopArticle(User $user)
    {
        // lấy all đơn hàng của user

        $articles = Article::all()->where('user_id',$user->id);

        // dd($Articles);

        
        return view('articles.show', compact('user','articles'));
    }


    public function search(Request $request)
    {
        $article = Article::all();

        $articles = $article->where('created_at','>=',$request->from.' 00:00:00')
                    ->where('created_at','<=',$request->to.' 23:59:59');
        return view('articles.index',compact('articles'));
    }
    public function fillter(Request $request){
    
        $articles = Article::all()->where('title',$request->input('title'));
        return view('articles.index',compact('articles'));
    }



    public function updateState($id)
    {
        $article = Article::find($id);
    
        if($article->title == 0)
        {
            $article->update([
                'title' => 1,
            
            ]);
        }
        else
        {
            $article->update([
                'title' => 0
            ]);
        }
       return redirect()->back()->with('message','Update state complete!!!!');
    }
    public function destroyArticleTag(Article $article, Tag $tag)
    {
        $article->tags()->detach($tag->id);
        return redirect(route('articles.show',$article->id))->with('message','Delete product complete!!!!');
    }
}
