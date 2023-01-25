<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\ContactUs;
use App\Country;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;


class ContactController extends Controller
{

    public function index(){
        $countries = Country::all();
        return view('admin.contact.index',compact('countries'));
    }
    public function store(ContactRequest $request,ContactUs $contact){
       $contact->create($request->all());
        return Redirect::back()->withFlashMessage('Message was sent successfully');

    }

    public function edit($id,ContactUs $contactUs){
        $countries = Country::all();
        $contact= $contactUs->find($id);
        $contact->fill(['view'=> 1])->save();
        return view('admin.contact.edit',compact('contact','countries'));
    }

    public function update($id,ContactUs $contactUs,ContactRequest $request){

        $contactupdated= $contactUs->find($id);
        $contactupdated->fill($request->all())->save();
        return redirect('/adminpanel/contact')->withFlashMessage('Message was updated successfully');
    }

    public function destroy($id)
    {
        $cont = ContactUs::find($id);
        $cont->delete();
        return redirect('/adminpanel/contact')->withFlashMessage('Message is deleted successfuly');
    }


    public function anyData(ContactUs $contact)
    {

        $contacts = $contact->all();

           return Datatables::of($contacts)

            ->editColumn('contact_name', function ($model) {
                return '<a href="'.url('/adminpanel/contact/' . $model->id . '/edit').'">'.$model->contact_name.'</a>';
            })
            ->editColumn('contact_email', function ($model) {
                return '<a href="'.url('/adminpanel/contact/' . $model->id . '/edit').'">'.$model->contact_email.'</a>';
            })
            ->editColumn('view', function ($model) {
                return $model->view==0 ? '<span class="badge badge-info">' . ' new message ' . '</span>' : '<span class="badge badge-warning">' . 'old message' . '</span>';
//                    ['<a href="'.url('/adminpanel/bu/' . $model->id).'"> <span class="btn btn-danger btn-circle"> <i class="fa fa-link"></i> </span> </a>'];
            })

            ->editColumn('control', function ($model) {
                $all = '<a href="' . url('/adminpanel/contact/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
                 $all .= '<a href="' . url('/adminpanel/contact/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle" onclick="preventDelete(event)"><i class="fa fa-trash-o"></i></a>';

                return $all;
            })
            ->rawColumns(['contact_name', 'contact_email', 'view', 'created_at', 'control'])->make(true);

    }

    public function contact()
    {
        $countries = Country::all();
        return view('web.contact.contact',compact('countries'));
    }
}
