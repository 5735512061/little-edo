<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<style>
.btn-group.special {
  display: flex;
  font-family: 'kanit' !important;
  
}

.special .btn {
  flex: 1;
  font-size: 20px !important;
  font-weight: bold;
  padding: 25px 25px !important;
}
</style>

<div class="btn-group special" role="group">
    <a href="{{url('/')}}" class="btn btn-default">Home</a>
    <a href="{{url('/little-edo/menu')}}" class="btn btn-default">Menu</a>
    <a href="{{url('/little-edo/gallery')}}" class="btn btn-default">Gallery</a>
    <a href="{{url('/little-edo/reserve-seat')}}" class="btn btn-default">Book a table</a>
    <a href="{{url('/little-edo/contact-us')}}" class="btn btn-default">Contact Us</a>
</div>