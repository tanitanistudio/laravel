<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Memo;
use App\Models\Tag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view){
            // インスタンス化
            $memo_model = new Memo();
            // メモ取得
            $memos = $memo_model->getMyMemo();
            
            $tags = Tag::where('user_id', '=', \Auth::id())
                ->whereNUll('deleted_at')
                ->orderBy('id', 'DESC')
                ->get();

            $view->with('memos',$memos)->with('tags',$tags);;
        });
    }
}
