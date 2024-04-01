<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\Schedule;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->paginate(5);
        return view('pages.user.transaction.index',[
            'transactions' => $transactions,
        ]);
    }

    // public function reschedule(Transaction $transaction, Request $request)
    // {
    //     $date = $request->input('date');
    //     $field_selected = $request->input('field',Field::pluck('id')->first());
    //     $schedules = Schedule::whereDate('datetime',\Illuminate\Support\Carbon::parse($date))
    //         ->where('field_id',$field_selected)
    //         ->get();

    //     $fields = Field::all();
    //     return view('pages.user.transaction.reschedule',[
    //         'transaction' => $transaction,
    //         'date' => $date,
    //         'field_selected' => $field_selected,
    //         'schedules' => $schedules,
    //         'fields' => $fields,
    //     ]);
    // }

    public function cancel(Transaction $transaction)
    {
        $transaction->status = 'cancel';
        $transaction->save();
        $bookings = $transaction->bookings;

        foreach ($bookings as $booking){
            if ($booking->schedule){
                $schedule = $booking->schedule;
                $schedule->status = 'available';
                $schedule->save();
            }
        }

        return redirect()->route('user::transaction');
    }

    public function show(Transaction $transaction)
    {
        return view('pages.user.transaction.show',[
            'transaction' => $transaction
        ]);
    }

    public function imageForm(Transaction $transaction)
    {
        return view('pages.user.transaction.upload-form',[
            'transaction' => $transaction
        ]);
    }

    public function imageStore(Transaction $transaction, Request $request)
    {
        if($request->hasFile('image')) {
                $file = $request->file('image') ;
                $fileName = $file->getClientOriginalName() ;
                $destinationPath = public_path().'/images/field'.$transaction->id.'/' ;
                $file->move($destinationPath,$fileName);
                $transaction->image = '/images/field'.$transaction->id.'/'.$fileName ;
                $transaction->save() ;
        }

        return redirect()->route('user::show-transaction',[$transaction]);
    }
}
