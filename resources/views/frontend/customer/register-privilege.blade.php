@extends("/frontend/layouts/template/template")
<script type="text/javascript" src="{{asset('js/halkaBox.min.js')}}"></script> <!-- รูปภาพโชว์ขึ้นมาเป็นสไลด์ -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/halkaBox.min.css')}}"> <!-- รูปภาพโชว์ขึ้นมาเป็นสไลด์ -->
<script type="text/javascript" src="{{asset('js/image-lightbox.js')}}"></script> <!-- รูปภาพโชว์ขึ้นมาเป็นสไลด์ -->
<style>
    @media only screen and (max-width: 768px) {
        #mobile {
            display: inline !important;
        }
        #desktop {
            display: none;
        }
    }
</style>
@section("content")

@include("/frontend/layouts/navbar")
<section class="contact_area" style="margin-top: 4rem;">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="row contact_form_area">
                    <p class="text-center">
                        <img src="{{ asset('/images/template/logo-2.png')}}" alt="#" width="25%" style="margin-bottom:10px;">
                     </p>
                    <h4 class="contact_title" style="font-size: 26px; text-align:center; margin-bottom:-20px; font-weight: 900;">กิจกรรมแจกอูนิ<br>ฟรี 50 กรัม มูลค่า 1,299 บาท</h4>
                    <form class="sendurl">
                        <div class="form-group col-md-12">
                            <input type="text" onkeyup="autoTab(this)" id="txtID" class="form-control" name="card_id" placeholder="หมายเลขบัตรประชาชน 13 หลัก">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="name" id="name" placeholder="ชื่อ-นามสกุล">
                        </div>
                        <div class="form-group col-md-12">
                          <input type="text" class="phone_format form-control" name="phone" id="phone" placeholder="เบอร์โทรศัพท์">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea class="form-control" name="address" id="address" placeholder="ที่อยู่ปัจจุบัน (ถ้ามี)"></textarea>
                          </div>
                        <input type="hidden" name="privilege" value="กิจกรรมแจกอูนิ<br>ฟรี 50 กรัม มูลค่า 1,299 บาท" id="privilege">
                        
                        <div class="panel-body" style="font-family: 'Kanit';">
                            <h3 style="font-weight: normal !important; font-family: 'Kanit';">เงื่อนไขในการลงทะเบียนรับสิทธิพิเศษ</h3>
                            <span class="tab-number">- แจกฟรีอูนิ 50g เมื่อทานอาหารครบ 2,000.-</span><br>
                            <span class="tab-number">- สิทธิพิเศษนี้ ไม่สามารถใช้ร่วมกับรายการส่งเสริมการขายอื่นได้</span><br>
                            <span class="tab-number">- สามารถใช้สิทธิ์ได้ 1 สิทธิ์ ต่อ 1 บิล เท่านั้น</span><br>
                            <span class="tab-number">- กดไลค์เพจ Little Edo 少し江戸 พร้อมแชร์โพสกิจกรรมแจกอูนิ และคอมเมนต์ใต้โพส</span><br>
                            <span class="tab-number">- ขอสงวนสิทธิ์ผู้ที่เคยลงทะเบียนรับฟรีเนื้อวากิว A4 แต่ไม่ได้ใช้สิทธิ์ จะไม่สามารถร่วมกิจกรรมแจกอูนิฟรีได้</span><br>
                            <span class="tab-number">- เงื่อนไขเป็นไปตามที่บริษัทกำหนด ขอสงวนสิทธิ์ในการแก้ไข เปลี่ยนแปลง หรือยกเลิกโดยไม่ต้องแจ้งให้ทราบล่วงหน้า</span><br><br>
                            <p><input type="checkbox" id="checkme" name="contidion" value="accept"> ยอมรับเงื่อนไขในการลงทะเบียนรับสิทธิพิเศษ</p>
                        </div> 
                        <div class="form-group col-md-12">
                            <button disabled="disabled" id="sendNewSms" class="btn btn-default submit_btn btn_sub" type="submit" class="send" data-toggle="modal" data-target="#myModal" data-backdrop="static">ลงทะเบียนรับสิทธิ์</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>
<div class="modal fade mobile" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm" style="margin-top:20rem !important;">
        <div class="modal-content">
            <div class="modal-body">
                <p class="text-center">
                    <img src="{{ asset('/images/template/logo-2.png')}}" alt="#" width="30%" style="margin-bottom:20px;">
                 </p>
                <div id="tag-id"></div>
            </div>
            <div class="modal-footer" style="background-color: #000000; font-family:'Kanit';">
                <button type="button" class="btn btn-secondary" style="color: #ffffff;" data-dismiss="modal" id="close">ปิด</button> 
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('https://code.jquery.com/jquery-3.2.1.min.js')}}"></script>

<script>
    // number phone
    function phoneFormatter() {
         $('input.phone_format').on('input', function() {
             var number = $(this).val().replace(/[^\d]/g, '')
                 if (number.length >= 5 && number.length < 10) { number = number.replace(/(\d{3})(\d{2})/, "$1-$2"); } else if (number.length >= 10) {
                     number = number.replace(/(\d{3})(\d{3})(\d{3})/, "$1-$2-$3"); 
                 }
             $(this).val(number)
             $('input.phone_format').attr({ maxLength : 12 });    
         });
     };
     $(phoneFormatter);
</script>   
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
<script>
$('.sendurl').submit(function(e){
    e.preventDefault();
    var name = $('#name').val();
    var phone = $('#phone').val();
    var address = $('#address').val();
    var privilege = $('#privilege').val();
    var card_id = $('#txtID').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: "{!! url('/little-edo/register-privilege') !!}",
        data: {
            _token:$('meta[name="csrf-token"]').attr('content'),
            name : name,
            phone : phone,
            address : address,
            privilege : privilege,
            card_id : card_id
        },
            success: function(response) {
                if(response.status === "NULL") {
                    $('#tag-id').html('<p style="text-align: center; font-family:Kanit; color:#000000;">กรุณากรอกข้อมูลให้ครบถ้วน</p>')
                }
                else if(response.status == "phone_unique"){
                    $('#tag-id').html('<p style="text-align: center; font-family:Kanit; color:#000000;">หมายเลขโทรศัพท์นี้เคยลงทะเบียนรับสิทธิ์แล้ว</p>')
                }
                else if(response.status == "card_id_unique"){
                    $('#tag-id').html('<p style="text-align: center; font-family:Kanit; color:#000000;">หมายเลขบัตรประชาชนนี้เคยลงทะเบียนรับสิทธิ์แล้ว</p>')
                }
                else if(response.status == "not_receive"){
                    $('#tag-id').html('<p style="text-align: center; font-family:Kanit; color:#000000;">ขอสงวนสิทธิ์ผู้ที่เคยลงทะเบียนรับฟรีเนื้อวากิว A4 แต่ไม่ได้ใช้สิทธิ์ จะไม่สามารถร่วมกิจกรรมแจกอูนิฟรีได้</p>')
                }
                else if(response.status === "Pass"){
                    $('#tag-id').html('<p style="text-align: center; font-weight: bold; color:#000000; font-family:Kanit;">สิทธิพิเศษสำหรับ คุณ'+response.name+'</p><p style="text-align: center; color:#000000; font-family:Kanit;">'+response.privilege+'</p><p style="text-align: center; background-color:#ff0000; color:#ffffff; margin:0px 60px 0px 60px; font-family:Kanit; font-size:25;">'+response.code+'</p><p style="margin-top:5px;font-size:15px; text-align: center; color:#000000; font-family:Kanit;">แสดงรหัสต่อพนักงานเพื่อรับสิทธิพิเศษ</p><p style="text-align: center; color:red; font-family:Kanit;">* สามารถใช้สิทธิ์ได้ตั้งแต่วันนี้ - 30 เม.ย. 64</p><p style="text-align: center; color:red; font-family:Kanit;">* กรุณาบันทึกภาพหน้าจอเพื่อแสดงต่อพนักงาน</p>')
                }
                console.log(response);
            }
    });
});

$('#close').click(function(){
    $('#name').val('');
    $('#phone').val('');
    $('#address').val('');
    $('#txtID').val('');
    $('#checkme').prop('checked', false);  
});
</script>

<script>
    var checker = document.getElementById('checkme');
    var sendbtn = document.getElementById('sendNewSms');
        // when unchecked or checked, run the function
        checker.onchange = function(){
            if(this.checked){
                sendbtn.disabled = false;   
            } else {
                sendbtn.disabled = true;
            }
    }
</script>
@endsection