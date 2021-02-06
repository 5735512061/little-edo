<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\model\Reserve;

use Validator;

class ReservesController extends Controller
{
    public function reserveSeat() {
        return view('frontend/reserve/reserve-form');
    }

    public function reserveSeatPost(Request $request) {
        $validator = Validator::make($request->all(), $this->rulesReserve(), $this->messagesReserve());
        if($validator->passes()) {
            $reserve = $request->all();
            $reserve = Reserve::create($reserve);
            return view('frontend/reserve/reserve-success')->with('reserve',$reserve);
        }
        else {
            return redirect('/little-edo/reserve-seat')->withErrors($validator)->withInput();
        }
    }

    public function rulesReserve() {
        return [
            'name' => 'required',
            'tel' => 'required',
            'date' => 'required',
            'time' => 'required',
            'quantity' => 'required',
        ];
    }

    public function messagesReserve() {
        return [
            'name.required' => 'กรุณากรอกชื่อลูกค้าเพื่อทำการจอง',
            'tel.required' => 'กรุณากรอกเบอร์โทรศัพท์',
            'date.required' => 'กรุณากรอกวันที่',
            'time.required' => 'กรุณากรอกเวลา',
            'quantity.required' => 'กรุณากรอกจำนวนลูกค้า',
        ];
    }
}
