@php
  
  $subtotal = 0;

@endphp

@if(isset($view))
@foreach($view as $d)

  @php
    $subtotal += $d->price*$d->qty;
  @endphp

<div class="row mt-3">
  <div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-8">
    <a href="">{{ $d->name }}</a>
  </div>

  <div class="col-xl-3 col-lg-3  col-md-4 col-sm-4 col-4 text-right">
    ৳ {{ $d->price*$d->qty }}
  </div>
</div>



@endforeach
@endif


<hr>





<div class="row mt-3">
  <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-6">
    <strong>Subtotal</strong>
  </div>

  <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-6 text-right">
    <strong>৳ {{  $subtotal  }}</strong>
  </div>
</div>



<div class="row mt-3">
  <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-6">
    <strong>Total</strong>
  </div>

  <div class="col-xl-4 col-lg-4  col-md-4 col-sm-4 col-6 text-right">
    <strong>৳ {{  $subtotal  }}</strong>
  </div>
</div>
