<?php

// namespace App\Http\Livewire;

// use App\Models\Booking;
// use App\Models\Equipment;
// use App\Models\Schedule;
// use Livewire\Component;

// class RescheduleComponent extends Component
// {

//     public $items = [];
//     public $field_selected;
//     public $fields;
//     public $schedules;
//     public $total = 0;
//     public $transaction;

//     public function sumTotal()
//     {
//         if ($this->items){
//             $schedule = Schedule::whereIn('id',$this->items)->first();
//             $this->total = $schedule->field->price * count($this->items);
//         }
//     }

//     public function reschedule()
//     {
//         $transaction = $this->transaction;
//         $currentBooking = $transaction->bookings;
//         $currentTotal = $transaction->total;
//         $minus = 0;
//         foreach ($currentBooking as $booking){
//             if ($booking->schedule){




//                 $currentSchedule = $booking->schedule;
//                 $currentSchedule->status = 'available';
//                 $currentSchedule->save();

//                 $price = $currentSchedule->field->price;
//                 $minus += $price;

//                 $booking->delete();
//             }
//         }

//         $schedules = Schedule::whereIn('id',$this->items)->get();
//         foreach ($schedules as $schedule){
//             $schedule->status = 'pending';
//             $schedule->save();

//             $booking = new Booking();
//             $booking->transaction_id = $transaction->id;
//             $booking->schedule_id = $schedule->id;
//             $booking->save();
//         }

//         $transaction->total = $currentTotal - $minus + $this->total;
//         $transaction->save();

//         $this->redirect(route('user::transaction'));
//     }

//     public function render()
//     {
//         return view('livewire.reschedule-component');
//     }
// }
