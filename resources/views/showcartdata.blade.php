      

@if(isset($view))
@foreach($view as $d)

<div class="row">
  <div class="col-md-2 col-12">
    <img src="{{ url($d->image) }}" class="img-fluid border">
  </div>

  <div class="col-md-8 col-12">
    <strong>{{ $d->name }}</strong><br>
    <form id='myform' method='POST' action='' class="mt-2">
      <input type='button' value='-' class='qtyminus' field='quantity' />
      <input type='text' name='quantity' min="1" value='{{ $d->qty }}' class='qty' />
      <input type='button' value='+' class='qtyplus' field='quantity' onclick="cartincrement('{{ $d->id }}')">
    </form>
  </div>

  <div class="col-md-2 col-12 text-right">
    <span>৳ {{ $d->price*$d->qty }}</span><br><br>
    <a href="#" onclick="deletecart('{{ $d->id }}')" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i>
    </a>
  </div>
</div>

@endforeach
@endif



<script type="text/javascript">



  function cartincrement(id){
    $.ajax({

     headers : { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
     url     : 'cartincrement/'+id,
     type    : 'POST',
     data    : {},
     

     success: function()
     {
      UIkit.notification({
        message: '<span uk-icon=\'icon: check\'></span> Product To Cart',
        pos:     'bottom-center',
        timeout:  2000
      });

      showcarts();
      summary();

    }
  });
  }



  function deletecart(id){

   $.ajax({

     headers : { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
     url     : 'deletecarts/'+id,
     type    : 'get',

     success: function()
     {
      UIkit.notification({
        message: '<span uk-icon=\'icon: check\'></span> Product Delete To Cart',
        pos:     'bottom-center',
        timeout:  2000
      });


      showcarts();
      summary();

    }
  });


 }






</script>
