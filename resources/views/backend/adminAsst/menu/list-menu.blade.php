@extends("/backend/layouts/adminAsst/template/template-adminAsst")

@section("content")
<div class="container">
    <div class="col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="col-md-12 text-right">
                <a href="{{url('/adminAsst/upload-menu')}}" class="btn btn-danger"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มเมนูอาหาร</a>
            </div>
            <div class="card-header">
                <h4 style="font-family: 'Kanit', sans-serif;">ข้อมูลเมนูอาหาร</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>ประเภท</th>
                                <th>ชื่อ (ไทย/อังกฤษ/ญี่ปุ่น)</th>
                                <th>รายละเอียด</th>
                                <th>ราคา</th>
                                <th>รูปภาพ</th>
                                <th></th>
                            </tr>
                            @foreach ($menus as $menu => $value)
                            <tr>
                                <td>{{$NUM_PAGE*($page-1) + $menu+1}}</td>
                                <td>{{$value->group}}</td>
                                <td>{{$value->thaiName}}, {{$value->engName}}, {{$value->japName}}</td>
                                <td>{{$value->detail}}</td>
                                <td>{{$value->price}}</td>
                                <td><i class="fa fa-eye"></i></td>
                                <td>
                                    <a href="{{url('/adminAsst/edit-menu')}}/{{$value->id}}">
                                      <i class="fa fa-pencil-square-o" style="color:blue;"></i>
                                    </a>                  
                                    <a href="{{url('/adminAsst/delete-menu/')}}/{{$value->id}}" onclick="return confirm('Are you sure to delete ?')">
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
@endsection