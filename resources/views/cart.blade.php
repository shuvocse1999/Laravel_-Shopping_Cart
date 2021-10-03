<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/css/uikit.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Cart System</title>
</head>
<body>


  @php 

  $product = DB::table('product')->get();


  @endphp


  <div class="col-md-12 p-4">
    <div class="container">
      <div class="row">


        @if(isset($product))
        @foreach($product as $p)

        <div class="col-md-4 text-center">
          <div class="border p-3">
           <img src="{{ asset($p->image) }}" class="img-fluid" style="max-height: 100px;"><br>
           <h4>{{ $p->name }}</h4>
           <strong>{{ $p->price }}</strong><br><br>
           <button class="btn btn-dark btn-sm" id="cart" onclick="cartfunction('{{ $p->id }}')">Add To Cart</button>

         </div>
       </div>


       @endforeach
       @endif




     </div>
   </div>
 </div>




 <script type="text/javascript">

  showcarts();
  summary();

   
   function cartfunction(id){
    
    $.ajax({
      headers : { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
      url     : 'add_to_cart/'+id,
      type    : 'POST',

      success: function()
      {
        UIkit.notification({
          message: '<span uk-icon=\'icon: check\'></span> Product Added To Cart',
          pos:     'bottom-center',
          timeout:  2000
        });


        showcarts();
        summary();



      }
    });

  }
  

  function showcarts(){
    $.ajax({
      headers : { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
      url     : 'getdata',
      type    : 'GET',
      data    : {},
      success: function(data)
      {

        $("#showcartdata").html(data);


      }
    });

  }



  function summary(){
    $.ajax({
      headers : { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
      url     : 'getsummary',
      type    : 'GET',
      data    : {},
      success: function(data)
      {

        $("#showsummary").html(data);


      }
    });

  }




</script>






<div class="col-md-12">
  <div class="container">
    <div class="row">


      <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 mt-4">

        <div class="mb-3"><strong>Product Summary</strong></div>
        <div class="productsummarys p-4">
          <div id="showcartdata"></div>

        </div>
      </div>



      <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 mt-4">
        <div class="mb-3"><strong>Order Summary</strong></div>
        <div class="pricesummary p-4">

          <div id="showsummary"></div>

          

          <br><br>

          <a href="confirmorder.php" class="btn btn-dark d-block p-2">Confirm Order</a>






        </div>
      </div>





    </div>
  </div>
</div>




<style type="text/css">
  .productsummarys{
    background: #fff;
    box-shadow: 0 1px 3px 0 rgba(0,0,0,0.1),0 1px 2px 0 rgba(0,0,0,0.06);
    border-radius: 5px;
  }


  .productsummarys strong{
    font-size: 15px;
  }

  .pricesummary{
    background: #fff;
    box-shadow: 0 1px 3px 0 rgba(0,0,0,0.1),0 1px 2px 0 rgba(0,0,0,0.06);
    border-radius: 5px;
  }


  .pricesummary a{
    font-size: 14px;

  }




  #myform .qty {
   padding: 1px;
   width: 30px;
   border: none;
   text-align: center;
 }


 #myform input.qtyplus { 
  padding: 1px;
  width: 30px;
  border: none;
  background-color: #fff;
  border:1px solid #e8e8e8;
  color: #414141;
  font-weight: bold;
  cursor: pointer;

}

#myform input.qtyminus {
  padding: 1px;
  width: 30px;
  border: none;
  background-color: #fff;
  border:1px solid #e8e8e8;
  color: #414141;
  font-weight: bold;
  cursor: pointer;

}






</style>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.7.3/dist/js/uikit-icons.min.js"></script>

</body>
</html>