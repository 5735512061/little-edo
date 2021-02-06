@extends("/backend/layouts/adminAsst/template/template-adminAsst")

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
                                <th>เบอร์โทรศัพท์</th>
                                <th>หัวข้อเรื่อง</th>
                                <th>ข้อความ</th>
                            </tr>
                            @foreach ($contacts as $contact => $value)
                            <tr>
                                <td>{{$NUM_PAGE*($page-1) + $contact+1}}</td>
                                <td>{{$value->tel}}</td>
                                <td>{{$value->subject}}</td>
                                <td>{{$value->message}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        {{$contacts->links()}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection