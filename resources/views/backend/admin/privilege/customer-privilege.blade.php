@extends("/backend/layouts/admin/template/template-admin")

@section("content")
<div class="col-md-1"></div>
<div class="col-md-10 col-12 col-sm-12">
    <div class="card"><br>
        <div class="s_black_title">
            <h3>สิทธิพิเศษ</h3>
        </div><br>
        <div class="container">
            <form action="{{url('/admin/search-privilege')}}" enctype="multipart/form-data" method="post">@csrf
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
                                <a href="{{url('/admin/delete-customer-privilege/')}}/{{$value->id}}" onclick="return confirm('Are you sure to delete ?')">
                                <i class="fa fa-trash" style="color:red;"></i>
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
                                    <form action="{{url('/admin/update-status-privilege')}}" enctype="multipart/form-data" method="post">@csrf
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
<script language="javascript">
    //เมื่อมีการคลิกฟังก์ชัน
    $(function (){
     $('.btn_sub').click(function (){
       if($('#txtID').val().trim()==''){
        $('#msg').text('กรุณากรอกเลขประจำตัว');
        $('#txtID').focus();
       }else{
        //checkID($('#txtID').val() จะไปเรียกฟังก์ชัน  checkID(id)
        if(!checkID($('#txtID').val().trim())){
         alert('รหัสประชาชนไม่ถูกต้อง');
         return false;
        }
       }
     });
    });
    
    //ตรวจสอบเลข ปปช ว่ามีจริงหรือไม่
    function checkID(id)
    {
    
    //ตัดข้อความ - ออก
    var zid = id;
    var zids = zid.split("-");
    for(var i=0;i<zids.length;i++){
     zids[i];
    }
    var id_val = zids[0]+zids[1]+zids[2]+zids[3]+zids[4];
    
    if(id_val.length != 13) return false;
    for(i=0, sum=0; i < 12; i++)
    sum += parseFloat(id_val.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id_val.charAt(12)))
    return false; return true;
    }
    
    //ฟังก์ชัน รูปแบบ
    function autoTab(obj){
     /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
     หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
     4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
     รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
     หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
     ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
     */
      var pattern=new String("_-____-_____-_-__"); // กำหนดรูปแบบในนี้
      var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
      var returnText=new String("");
      var obj_l=obj.value.length;
      var obj_l2=obj_l-1;
      for(i=0;i<pattern.length;i++){   
       if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
        returnText+=obj.value+pattern_ex;
        obj.value=returnText;
       }
      }
      if(obj_l>=pattern.length){
       obj.value=obj.value.substr(0,pattern.length);   
      }
    }  
</script>
@endsection