<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\SimpleSliderController;

use App\Http\Controllers\MenuController;

use App\Http\Controllers\StaticPostsController;

use App\Http\Controllers\SlidersController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\InforCompanyController;
use App\Models\Informations;
use App\Http\Controllers\FormContactController;

use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\SettingConfigurationController;

use App\Http\Controllers\SettingController;

use App\Models\SettingConfiguration;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\EmailConfigurationController;
use App\Models\Tags;
use CKSource\CKFinderBridge\Controller\CKFinderController;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use SebastianBergmann\CodeCoverage\Report\Xml\Tests;
use App\Http\Controllers\TagsController;
use App\Models\StaticPosts;
use App\Http\Controllers\SitemapController;
use  App\Http\Controllers\SlugController;
use Spatie\Analytics\AnalyticsFacade as Analytics; //Change here
use Spatie\Analytics\Period;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/data', function () {
    $test = Analytics::fetchMostVisitedpages(Period::days(7));
    dd($test);
});
/* Route::get('/', [PublicController::class, 'Home'] ); */

Route::get('', function () {
    return view('home');
});





