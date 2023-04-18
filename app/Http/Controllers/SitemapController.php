<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Menu;
use App\Models\MenuNode;
use App\Models\Slug;
use App\Models\Block;
use Illuminate\Support\Facades\Route;

class SitemapController extends Controller
{

        /**
     * Write code on Method
     *
     * @return response()
     */
    public function page($value = '')
    {
        $page = Block::select("*")->where('slug', $value)->get();
        return response()->view('layouts.page', [
            'page' => $page,
        ])->header('Content-Type', 'text/html');
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function post($value = '')
    {

        $post = Post::select("*")->where('slug', $value)->get();
        $posts = Post::select("*")->get();
        return response()->view('layouts.post', [
            'post' => $post,
            'posts' => $posts,
        ])->header('Content-Type', 'text/html');
    }

    /**
     * Write code on Method
     * @return response()
     */
    public function caretoties($value = '')
    {


        $isslug = Slug::where('key',$value)
        ->exists();

        if( $isslug)
        {

                $menu = Menu::select("*")->where('slug', $value)->get();
                foreach ($menu as   $menu ) {
                    # code...
                    $menunode = MenuNode::select("*")->where('menu_id', $menu->id)->first();
                }

                return response()->view('layouts.caretoties', [
                    'slug' => $value,
                    'menu' => $menu,
                    'menunode' => $menunode,
                ])->header('Content-Type', 'text/html');

        }

    }
}
