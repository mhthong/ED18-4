<?php
 namespace App\Http\ViewComposers;

 use Illuminate\View\View;
 use App\Models\Setting;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Str;
 class SettingComposer
 {
    public $movieList = [];
     /**
      * Create a movie composer.
      *
      * @return void
      */
     public function __construct()
     {

        $setting_data = Setting::select("*")->get();

        foreach ($setting_data as $key => $value) {
            # code...
            $this->movieList[$value->key] = $value->value;

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

         $view->with('setting_data', $this->movieList);
     }


 }
