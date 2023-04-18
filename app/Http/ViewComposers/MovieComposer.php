<?php
 namespace App\Http\ViewComposers;

 use Illuminate\View\View;
 use App\Models\Menu;
 use App\Models\MenuNode;
 use App\Models\MenuLocation;
 use App\Models\Slug;
 use App\Models\MetaBoxes;
 use Faker\Guesser\Name;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Str;
 class MovieComposer
 {
    public $movieList = [];
     /**
      * Create a movie composer.
      *
      * @return void
      */
     public function __construct()
     {

     }

     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
     public function compose(View $view)
     {


     }


 }
