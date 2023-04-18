<?php
 namespace App\Http\ViewComposers;

 use Illuminate\View\View;
 use App\Models\Post;
 use App\Models\Menu;
 use App\Models\Categories;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Str;
 class PostComposer
 {
    public $movieList = [];
     /**
      * Create a movie composer.
      *
      * @return void
      */
     public function __construct()
     {

        $menu = Menu::select("*")->get();

        $post_data = Post::select("*")
        ->get();

        foreach ($menu as $menu) {
            # code...
            foreach ($post_data as $post_data_value) {
                # code...
                $categories = Categories::select("*")
                    ->where("posts_id",$post_data_value->id)
                    ->get();

                foreach ($categories as $categories_key => $categories_value) {
                    # code...
                    if($categories_value -> categories_id != "null")
                    {
                        foreach (json_decode($categories_value -> categories_id) as $key => $value) {
                            # code...

                            if($menu->id ==  $value)
                            {
                                $this->movieList[$menu->slug][] = Post::select("*")->where("id", $categories_value -> posts_id)->get();
                            }
                        }
                    }

                }

        }
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
         $view->with('post_data', $this->movieList);
     }


 }
