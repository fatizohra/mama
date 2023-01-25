<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Auth;
use Pagination;
use DB;
use App\Category;
use App\CategoryUser;
use Yajra\DataTables\DataTables;
use App\Http\Requests\CategoryRequest;



class CategoriesController extends Controller
{

    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        $parent_cat = Category::all();

        return view('admin.category.add',compact('parent_cat'));
    }

    public function store(CategoryRequest $catRequest, Category $category)
    {
        $img = $catRequest->file('image');
        if($img){
            $extention = $img->getClientOriginalExtension();
            $newFileName = str_random(13) . '.' . $extention;
            $fileName =  uploadImage($img,$newFileName);
            $image = $fileName;

        }
        $user = Auth::user();
        $category = new Category();
        $data = [
            'name' => $catRequest->name,
            'image' => $image,
        ];

        $category->create($data)->id;
        return redirect('adminpanel/category')->withFlashMessage('SubCategory is added successfuly');
    }

    public function edit($id)
    {
        $category = Category::find($id);
      //  $subcategory= SubCategory::with('subcategories')->where('id',$id)->first();
        return view('admin.category.edit', compact('category'));
    }

    public function update($id, Request $request)
    {
        $category_updated= Category::find($id);
        $category_updated->fill(array_except($request->all(), ['image']))->save();
        $img = $request->file('image');
        if($img){
            $extention = $img->getClientOriginalExtension();
            $newFileName = str_random(13) . '.' . $extention;
            $fileName =  uploadImage($img,$newFileName, '/public/website/images/' , '500' , '362', $category_updated->image);
            $category_updated->fill(['image' => $fileName])->save();
        }

        return redirect('/adminpanel/category')->withFlashMessage('Category is updated successfuly');

    }

    public function destroy($id)
    {
            $cat_delete = Category::find($id);
           $cat_delete->delete();
            return redirect('/adminpanel/category')->withFlashMessage('Category is deleted successfuly');
    }

    public function anyData(Request $request, Category $category)
    {

        $categories = $category->all();

        return Datatables::of($categories)
            ->editColumn('name', function ($model) {
                return '<a href="' . url('/adminpanel/category/' . $model->id . '/edit') . '">' . $model->name . '</a>';
            })
            ->editColumn('items', function ($model) {
                return '<a href="' . url('/adminpanel/item/' . $model->id) . '"><span class="btn btn-danger btn-circle"><i class="fa fa-link"></i></span></a>';
            })

            ->editColumn('control', function ($model) {
                $all = '<a href="' . url('/adminpanel/category/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
                // $all = "<a href='{{url("/adminpanel/users/" .$model->id . '/edit') }}' class='btn btn-info btn-circle'><i class='fa fa-edit'></i></a>";
                $all .= '<a href="' . url('/adminpanel/category/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle" onclick="preventDelete(event)"><i class="fa fa-trash-o"></i></a>';


                return $all;
            })
            ->rawColumns(['name','items','control'])->make(true);

    }



    public function showCategories(){
        $categories= Category::all();
        return view('categories', compact('categories'));
    }



    public function addCategory(Request $request)
    {
        $categories= Category::all();
        $category_user = new CategoryUser();
        $category_user->user_id = auth()->id();
        $category_user->category_id = $request->category_id;
        $category_user->save();

        return redirect('home');
    }



}
