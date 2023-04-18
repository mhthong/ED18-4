<?php
 namespace App\Http\ViewComposers;

 use Illuminate\View\View;
 use App\Models\Block;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Str;
 class PageComposer
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

         $view->with('page', $this->movieList);
     }


 }
