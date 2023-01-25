<?php

use Illuminate\Http\Request;
use App\Post;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();


});
Route::group(['middleware'=>'api'],function(){
    //get all posts
    Route::get('/posts',function(){
        return Post::latest()->orderBy('created_at','DESC')->get();
    });
    //get single post
    Route::get('/posts/{id}',function($id){
        return Post::findOrFail($id);
    });
    //add posts
    Route::post('/posts/store',function(Request $request){
        return Post::create(['body'=>$request->body]);
    });
    //update post
    Route::patch('/posts/{id}',function(Request $request,$id){
        Post::findOrFail($id)->update(['body'=>$request->body]);
    });
    //delete post
    Route::delete('/posts/{id}',function($id){
        Post::findOrFail($id)->delete();
    });

});
