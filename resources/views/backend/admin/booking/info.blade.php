@extends("/backend/layouts/admin/template/template-admin")

@section("content")
<div class="container">
    <div class="col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>ชื่อลูกค้า</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>วันที่ / เวลา</th>
                                <th>จำนวนที่นั่ง</th>
                                <th>หมายเหตุ</th>
                                <th></th>
                            </tr>
                            @foreach ($infos as $info => $value)
                            <tr>
                                <td>{{$NUM_PAGE*($page-1) + $info+1}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->tel}}</td>
                                <td>{{$value->date}} {{$value->time}}น.</td>
                                <td>{{$value->quantity}} ท่าน</td>
                                <td>{{$value->comment}}</td>
                                <td>
                                    {{-- <a href="{{url('/admin/edit-booking')}}/{{$value->id}}">
                                      <i class="fa fa-pencil-square-o" style="color:blue;"></i>
                                    </a> --}}
                                    <a href="{{url('/admin/delete-booking/')}}/{{$value->id}}" onclick="return confirm('Are you sure to delete ?')">
                                      <i class="fa fa-trash" style="color:red;"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        {{$infos->links()}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection