<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use App\Models\Equipment;
use App\Models\Schedule;
use App\Models\Transaction;
use Livewire\Component;

class ScheduleComponent extends Component
{
    public $items = [];
    public $field_selected;
    public $fields;
    public $schedules;
    public $equip_orders = [];
    public $field_total = 0;
    public $equip_total = 0;
    public $total = 0;
    public $equip_items = [];
    public $showForm = false;
    public $showPayment = false;
    public $transactionId;

    public function sumTotal()
    {
        if ($this->items){
            $schedule = Schedule::whereIn('id',$this->items)->first();
            $this->field_total = $schedule->field->price * count($this->items);
            if ($this->equip_items){
                // $this->equip_orders =  Equipment::whereIn('id',$this->equip_items)->get()->toArray();
                $this->equip_total = collect($this->equip_orders)->pluck('price')->sum();
                $this->total = $this->equip_total + $this->field_total;
            }else{
                $this->total = $this->field_total;
            }
        }
    }

    public function createOrder()
    {
        $transaction = new Transaction();
        $transaction->total = $this->total;
        $transaction->user_id = auth()->user()->id;
        $transaction->booking_type = 'online';
        $transaction->status = 'pending';
        $transaction->save();

        $schedules = Schedule::whereIn('id',$this->items)->get();
        // $equipments = Equipment::whereIn('id',$this->equip_items)->get();
        foreach ($schedules as $schedule){
            $schedule->status = 'pending';
            $schedule->save();

            $booking = new Booking();
            $booking->transaction_id = $transaction->id;
            $booking->schedule_id = $schedule->id;
            $booking->save();
        }

        // foreach ($equipments as $equipment){
        //     $booking = new Booking();
        //     $booking->transaction_id = $transaction->id;
        //     $booking->equipment_id = $equipment->id;
        //     $booking->save();
        // }

        $this->transactionId = $transaction->id;
        $this->showPayment = true;


    }

    public function render()
    {
        return view('livewire.schedule-component',[
            // 'equipments' => Equipment::get(),
        ]);
    }
}
