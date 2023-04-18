<?php
 namespace App\Http\ViewComposers;

 use Illuminate\View\View;
 use App\Models\SimpleSlider;
 use App\Models\SimpleSliderItem;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Str;
 class SliderComposer
 {
    public $movieList = [];
     /**
      * Create a movie composer.
      *
      * @return void
      */
     public function __construct()
     {

        $SimpleSlider = SimpleSlider::select("*")->get();
        foreach ($SimpleSlider as $key) {
            # code...
            $SimpleSliderItem = SimpleSliderItem::where('simple_slider_id', $key->id)->orderBy('order','asc')->get();
            $this -> movieList[$key->key] =  $SimpleSliderItem ;
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

         $view->with('SimpleSlider', $this->movieList);
     }


 }
