<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Yajra\DataTables\DataTables;
use App\Comment;

class CommentController extends Controller
{


    public function index(){
        return view('admin.comment.index');
    }

    public function edit($id){
        $comment= Comment::with('user','item')->find($id);
        $comment->save();
        return view('admin.comment.edit',compact('comment'));
    }

    public function update($id,Request $request){

        $commentupdated= Comment::find($id);
        $commentupdated->fill($request->all())->save();
        return redirect('/adminpanel/comment')->withFlashMessage('Comment was updated successfully');
    }

    public function destroy($id)
    {
        $cont = Comment::find($id);
        $cont->delete();
        return redirect('/adminpanel/comment')->withFlashMessage('Comment is deleted successfuly');
    }


    public function anyData(Comment $comment)
    {

        $comments = $comment->all();

        return Datatables::of($comments)

            ->editColumn('comment', function ($model) {
                return '<a href="'.url('/adminpanel/comment/' . $model->id . '/edit').'">'.$model->comment.'</a>';
            })
            ->editColumn('user', function ($model) {
                return $model->user->lastname;
            })
            ->editColumn('post', function ($model) {
                return $model->item->id;
            })

            ->editColumn('control', function ($model) {
                $all = '<a href="' . url('/adminpanel/comment/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
                $all .= '<a href="' . url('/adminpanel/comment/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle" onclick="preventDelete(event)"><i class="fa fa-trash-o"></i></a>';

                return $all;
            })
            ->rawColumns(['comment', 'user', 'post', 'created_at', 'control'])->make(true);

    }







    public function addComment(Request $request){
        $comment = $request->comment;
        $id = $request->id;


        $comment_id= DB::table('comments')
            ->insertGetId(['comment' =>$comment, 'user_id' => Auth::user()->id, 'item_id' => $id,
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString()]);
        if($comment_id){
           // return post::with('user','comments')->orderBy('created_at','DESC')->get();
            // return all posts same as before
            $newComment = Comment::with('user','user.profile')->where('id',$comment_id)->first();


            return response()->json(
                [
                    'error'=>false,
                    'comment'=>$newComment
                ]
            );
        }
    }
    public function getComments($id)
    {
        $comments = Comment::with('item','user','user.profile')->where('item_id',$id)->get();
        return $comments;
    }
    public function deleteComment($id){
        $deleteComment = DB::table('comments')->where('id',$id)->delete();
        return Response()->json(['etat' => true]);
    }

}
