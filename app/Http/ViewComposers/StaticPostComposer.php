<?php
 namespace App\Http\ViewComposers;

 use Illuminate\View\View;
 use App\Models\StaticPosts;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Str;
 class StaticPostComposer
 {
    public $movieList = [];
     /**
      * Create a movie composer.
      *
      * @return void
      */
     public function __construct()
     {

        $StaticPosts = StaticPosts::select("*")->get();

        foreach ($StaticPosts as $key => $value) {
            # code...
            $static_post = StaticPosts::where('alias',$value->alias)->get();
            $this->movieList[$value->alias] =  $static_post;

        }


     }

     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
     public function compose(View $view)
     {

         $view->with('static_data', $this->movieList);
     }


 }
