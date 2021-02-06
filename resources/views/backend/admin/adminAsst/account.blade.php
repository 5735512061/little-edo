@extends("/backend/layouts/admin/template/template-admin")

@section("content")
<div class="container">
    <div class="col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="col-md-12 text-right">
                <a href="{{url('/admin/create-adminAsst')}}" class="btn btn-danger"><i class="fa fa-plus-circle" aria-hidden="true"></i> ลงทะเบียนบัญชีผู้ใช้ใหม่</a>
            </div>
            <div class="card-header">
                <h4 style="font-family: 'Kanit', sans-serif;">ข้อมูลบัญชีผู้ดูแลระบบ</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>ชื่อผู้ใช้</th>
                                <th>รหัสผ่าน</th>
                                <th>บทบาทผู้ใช้</th>
                                <th></th>
                            </tr>
                            @foreach ($accounts as $account => $value)
                            <tr>
                                <td>{{$NUM_PAGE*($page-1) + $account+1}}</td>
                                <td>{{$value->adminAsst_name}}</td>
                                <td>{{$value->password}}</td>
                                <td>{{$value->role}}</td>
                                <td>
                                    <a href="{{url('/admin/edit-menu')}}/{{$value->id}}">
                                      <i class="fa fa-pencil-square-o" style="color:blue;"></i>
                                    </a>                  
                                    <a href="{{url('/admin/delete-menu/')}}/{{$value->id}}" onclick="return confirm('Are you sure to delete ?')">
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