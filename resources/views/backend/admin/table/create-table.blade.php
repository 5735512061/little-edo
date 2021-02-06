@extends("/backend/layouts/admin/template/template-admin")

@section("content")
<!--================Booking Table Area =================-->
<section class="booking_table_area">
    <div class="container">
        <div class="s_white_title top_content">
            <h3>จัดการโต๊ะอาหาร</h3>
        </div>
        <form action="{{url('/admin/create-table')}}" enctype="multipart/form-data" method="post">@csrf
            <div class="row">
                <div class="col-sm-3">
                    <div class="input-append">
                        <input type="text" name="number" placeholder="หมายเลขโต๊ะ">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="input-append">
                        <input type="text" name="seat" placeholder="จำนวนที่นั่ง">
                    </div>
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-default submit_btn">เพิ่มหมายเลขโต๊ะ</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12 col-12 col-sm-12" style="margin-bottom: 5rem;">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>หมายเลขโต๊ะ</th>
                                        <th>จำนวนที่นั่ง</th>
                                        <th></th>
                                    </tr>
                                    @foreach ($tables as $table => $value)
                                    <tr>
                                        <td>{{$NUM_PAGE*($page-1) + $table+1}}</td>
                                        <td>โต๊ะ {{$value->number}}</td>
                                        <td>{{$value->seat}} ที่นั่ง</td>
                                        <td>
                                            <a href="{{url('/admin/edit-table')}}/{{$value->id}}">
                                            <i class="fa fa-pencil-square-o" style="color:blue;"></i>
                                            </a>                  
                                            <a href="{{url('/admin/delete-table/')}}/{{$value->id}}" onclick="return confirm('Are you sure to delete ?')">
                                            <i class="fa fa-trash" style="color:red;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Recent Blog Area =================-->

@endsection