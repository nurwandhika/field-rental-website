<?php

namespace App\Console\Commands;

use App\Models\Field;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GenerateScheduleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:schedule {--day=} {--end=} {--start=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command untuk membuat jadwal';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $fields = Field::where('is_open',true)->get();
        $days = $this->option('day') ?? 3;
        $start = $this->option('start') ?? 9;
        $end = $this->option('end') ?? 15;

        if ($this->option("day") == 0){
            $date = Carbon::now();
        }else{
            $date = Carbon::now()->addDays($days);
        }

        foreach ($fields as $field){
            foreach (range($start,$end) as $time){
                $time_var = $date->setTime($time,0,0);
                $check = Schedule::where("datetime",$time_var)->where('field_id',$field->id)->first();
                if ($check){
                    continue;
                }
                $schedule = new Schedule();
                $schedule->field_id = $field->id;
                $schedule->datetime = $time_var;
                $schedule->save();
            }
        }
    }
}
