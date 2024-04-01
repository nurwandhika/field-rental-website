<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $field_selected = $request->input('field',0);
        $date = $request->input('date',now()->format('Y-m-d'));
        $fields = Field::where('is_open',true)->get();
        $schedules = Schedule::whereDate('datetime',$date)->whereDate('datetime','>=',now())->when($field_selected > 0,function ($q) use ($field_selected){
            $q->where('field_id',$field_selected);
        })->orderBy('datetime')->paginate();
        return view('pages.admin.schedule.index',[
            'schedules' => $schedules,
            'field_selected' => $field_selected,
            'fields' => $fields,
            'date' => $date,
        ]);
    }

    public function changeStatus(Schedule $schedule,Request $request)
    {
        $schedule->status = $request->input('status');
        $schedule->save();

        return redirect()->route('admin::schedule::index');
    }

    public function create()
    {
        $schedule = new Schedule();
        $fields = Field::where('is_open',true)->get();

        return view('pages.admin.schedule.form',[
            'schedule' => $schedule,
            'fields' => $fields,
        ]);
    }

    public function store(Request $request)
    {
        $selectedDate = Carbon::parse($request->input('date'))->startOfDay();
        $days = $selectedDate->diffInDays(now()->startOfDay());
        $field_id = $request->input('field_id');
        $start = $request->input('start',9);
        $end = $request->input('end',15);
        if ($days == 0){
            $date = Carbon::now();
        }else{
            $date = Carbon::now()->addDays($days);
        }

            foreach (range($start,$end) as $time){
                $time_var = $date->setTime($time,0,0);
                $check = Schedule::where("datetime",$time_var)->where('field_id',$field_id)->first();
                if ($check){
                    continue;
                }
                $schedule = new Schedule();
                $schedule->field_id = $field_id;
                $schedule->datetime = $time_var;
                $schedule->save();
            }

        return redirect()->route('admin::schedule::index');
    }
}
