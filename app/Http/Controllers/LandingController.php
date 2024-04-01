<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\FieldImage;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->input('date');
        $field_selected = $request->input('field',Field::pluck('id')->first());
        $schedules = Schedule::whereDate('datetime',\Illuminate\Support\Carbon::parse($date))
                    ->where('field_id',$field_selected)
                    ->get();

        $fields = Field::all();
        return view('pages.landing.schedule',[
            'schedules' => $schedules,
            'date' => $date,
            'fields' => $fields,
            'field_selected' => $field_selected,
        ]);
    }

    public function gallery(Request $request)
    {
        $fieldSelected = $request->input('field', Field::pluck('id')->first());
        $fields = Field::all();
        $images = FieldImage::where('field_id',$fieldSelected)->get();
//        dd($images);
        return view('pages.landing.gallery',[
            'fieldSelected' => $fieldSelected,
            'fields' => $fields,
            'field' => Field::find($fieldSelected),
            'images' => $images,
        ]);
    }

    public function about()
    {
        return view('pages.landing.about');
    }
}
