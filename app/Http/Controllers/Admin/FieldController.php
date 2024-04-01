<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\FieldImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class FieldController extends Controller
{
    public function index()
    {
        $fields = Field::all();
        return view('pages.admin.field.index',[
            'fields' => $fields,
        ]);
    }

    public function create()
    {
        $field = new Field();

        return view('pages.admin.field.form',[
            'field' => $field
        ]);
    }

    public function store(Request $request)
    {
        $field = new Field();
        $field->name = $request->input('name');
        $field->is_open = $request->input('is_open',false);
        $field->phone = $request->input('phone');
        $field->address = $request->input('address');
        $field->price = $request->input('price');
        $field->save();

        return redirect()->route('admin::field::index');
    }

    public function edit(Field $field, Request $request)
    {
        return view('pages.admin.field.form',[
            'field' => $field
        ]);
    }

    public function update(Field $field, Request $request)
    {
        $field->name = $request->input('name');
        $field->is_open = $request->input('is_open',true);
        $field->price = $request->input('price');
        $field->phone = $request->input('phone');
        $field->address = $request->input('address');
        $field->save();

        return redirect()->route('admin::field::show',[$field]);
    }

    public function show(Field $field)
    {
        return view('pages.admin.field.show',[
            'field' => $field
        ]);
    }

    public function imageForm(Field $field)
    {
        return view('pages.admin.field.image-form',[
            'field' => $field
        ]);
    }

    public function imageStore(Field $field, Request $request){

        if($request->hasFile('images')) {
           foreach ($request->file('images') as $image){
               $fieldImage = new FieldImage() ;
               $file = $image ;
               $fileName = $file->getClientOriginalName() ;
               $destinationPath = public_path().'/images/field'.$field->id.'/' ;
               $file->move($destinationPath,$fileName);
               $fieldImage->field_id = $field->id;
               $fieldImage->image_url = '/images/field'.$field->id.'/'.$fileName ;
               $fieldImage->save() ;

           }
        }

        return redirect()->route('admin::field::show',$field);
    }

    public function deleteImage()
    {

    }
}
