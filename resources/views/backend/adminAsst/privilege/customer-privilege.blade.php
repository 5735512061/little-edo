@extends("/backend/layouts/adminAsst/template/template-adminAsst")

@section("content")
<div class="col-md-1"></div>
<div class="col-md-10 col-12 col-sm-12">
    <div class="card"><br>
        <div class="s_black_title">
            <h3>สิทธิพิเศษ</h3>
        </div><br>
        <div class="container">
            <form action="{{url('/adminAsst/search-privilege')}}" enctype="multipart/form-data" method="post">@csrf
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3" style="margin-top: 10px;">
                        <input type="text" name="code_search" class="form-control" placeholder="ค้นหาตามรหัสรับสิทธิ์"><br>
                        <button type="submit" class="btn btn-primary">ค้นหารหัสรับสิทธิ์</button>
                    </div>
                    <div class="col-md-3" style="margin-top: 10px;">
                        <input type="text" onkeyup="autoTab(this)" id="txtID" name="card_id_search" class="form-control" placeholder="ค้นหาตามหมายเลขบัตรประชาชน"><br>
                        <button type="submit" class="btn btn-primary">ค้นหาหมายเลขบัตรประชาชน</button>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>หมายเลขบัตรประชาชน</th>
                            <th>ชื่อ-นามสกุลลูกค้า</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>สิทธิพิเศษ</th>
                            <th>รหัสรับสิทธิ์</th>
                            <th>วันที่ลงทะเบียน</th>
                            <th>สถานะ</th>
                            <th>วันที่ใช้สิทธิ์</th>
                            <th></th>
                        </tr>
                        @foreach ($privileges as $privilege => $value)
                        <tr>
                            <td>{{$NUM_PAGE*($page-1) + $privilege+1}}</td>
                            <td>{{$value->card_id}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->phone}}</td>
                            <td>{{$value->privilege}}</td>
                            <td>{{$value->code}}</td>
                            <td>{{$value->date}}</td>
                            @php
                                $date = DB::table('status_customer_privileges')->where('customer_privilege_id',$value->id)->value('date');
                                $status = DB::table('status_customer_privileges')->where('customer_privilege_id',$value->id)->value('status');
                            @endphp
                            @if($status == NULL)
                                <td style="color:red;">ยังไม่ใช้สิทธิ์</td>
                            @else 
                                <td style="color:green;">{{$status}}</td>
                            @endif
                            <td>{{$date}}</td>
                            <td>
                                <a type="button" data-toggle="modal" data-target="#Modal{{$value->id}}">
                                    <i class="fa fa-pencil-square-o" style="color:blue;"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLabel" style="font-family:'Kanit";>ยืนยันการใช้สิทธิ์</h5>
                                    </div>
                                    <form action="{{url('/adminAsst/update-status-privilege')}}" enctype="multipart/form-data" method="post">@csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="status" value="ใช้สิทธิ์แล้ว" readonly>
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="{{$value->id}}">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">ยืนยันการใช้สิทธิ์</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                    {{$privileges->links()}}
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-1"></div>
@endsection