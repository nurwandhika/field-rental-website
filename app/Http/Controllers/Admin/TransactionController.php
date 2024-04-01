<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        $status = $request->input('status');
        $date = $request->input('date',now()->format('Y-m-d'));
        $transactions = Transaction::when($status != '',function ($query) use ($status){
            $query->where('status',$status);
        })->whereDate('created_at',Carbon::parse($date))
            ->orderBy('created_at')->paginate();

        return view('pages.admin.transaction.index',[
            'status' => $status,
            'date' => $date,
            'transactions' => $transactions,
        ]);
    }

    public function confirm(Transaction $transaction)
    {
        $transaction->status = 'success';
        $transaction->save();

        $bookings = $transaction->bookings;

        foreach ($bookings as $booking){
            if ($booking->schedule){
                $schedule = $booking->schedule;
                $schedule->status = 'booked';
                $schedule->save();
            }
        }

        return redirect()->route('admin::transaction::show',[$transaction]);
    }

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

        return redirect()->route('admin::transaction::show',[$transaction]);
    }

    public function pending(Transaction $transaction)
    {
        abort_if(auth('admin')->user()->role != 'superadmin',403,'Anda tidak berhak mengakses halaman ini.');
        $transaction->status = 'pending';
        $transaction->save();
        $bookings = $transaction->bookings;

        foreach ($bookings as $booking){
            if ($booking->schedule){
                $schedule = $booking->schedule;
                $schedule->status = 'pending';
                $schedule->save();
            }
        }

        return redirect()->route('admin::transaction::show',[$transaction]);
    }

    public function show(Transaction $transaction)
    {
        return view('pages.admin.transaction.show',[
            'transaction' => $transaction
        ]);
    }
}
