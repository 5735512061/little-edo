@extends("/backend/layouts/admin/template/template-admin")

@section("content")
<section class="booking_table_area" style="height: 100%;">
    <div class="container">
        <div class="s_black_title" style="margin-top: 5rem; margin-bottom: 5rem;">
            <h3>จัดการบุ๊คกิ้ง โต๊ะ {{$booking->number}}</h3>
        </div>
        <form action="{{url('/admin/edit-booking')}}" enctype="multipart/form-data" method="post">@csrf
            <div class="row">
                <div class="col-sm-3">
                    <div class="party_size">
                        <select class="selectpicker" name="table_id">
                            @php
                                $number = DB::table('tables')->where('id',$booking->table_id)->value('number');
                            @endphp
                            <option style="font-family: 'kanit' !important;" value="{{$booking->table_id}}">โต๊ะที่ {{$number}}</option>
                        </select>
                    </div><br>
                </div>
                <div class="col-sm-3">
                    <div class="party_size">
                        <select class="selectpicker" name="status">
                            <option style="font-family: 'kanit' !important;" value="ไม่ว่าง">ไม่ว่าง</option>
                            <option style="font-family: 'kanit' !important;" value="ว่าง">ว่าง</option>
                        </select>
                    </div><br>
                </div>
                <div class="col-sm-3">
                    <div class="input-append">
                        <input type="text" name="seat" value="{{$booking->seat}}">
                    </div><br>
                </div>
                <div class="col-sm-3">
                    <div class="input-append">
                        <input style="font-family: kanit !important;" class="form-control js-datepicker" size="16" type="text" name="date" value="{{$booking->date}}"><br>
                    </div>
                </div>
                <div class="col-sm-3">
                    <input type="hidden" name="id" value="{{$booking->id}}">
                    <button type="submit" class="btn btn-default submit_btn" style="height:34px;">ลงรายการจองโต๊ะ</button>
                </div>
            </div>
        </form><br>
    </div>
</section>
<!-- Jquery JS-->
<script type="text/javascript" src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<!-- Vendor JS-->
<script type="text/javascript" src="{{asset('vendor/select2/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/datepicker/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/datepicker/daterangepicker.js')}}"></script>
<!-- Main JS-->
<script type="text/javascript" src="{{asset('js/global.js')}}"></script>
<script type="text/javascript" src="{{asset('https://code.jquery.com/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/js/uikit.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
@endsection