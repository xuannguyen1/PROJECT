@extends('layouts.master')

@section('content')
<section class="header_text sub">
    <img class="pageBanner" src="{{ asset('themes/images/pageBanner.png')}}" alt="New products" >
              
</section>

  <style type="text/css">
      
      .col-sm-12.col-md-10.col-md-offset-1 {
      max-width: 1150px;
      margin: 0 auto;
  }
  </style>
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                <input type = "hidden"value ="{{$result = 0}}">
                    <form action = "checkout" method = "post" ><!-- action = "checkout" method = "post" -->
                   {{ csrf_field()}}
                    @if(Session::has('product'))
                            <input type = "hidden"value ="{{$bill_code = rand()}}" name = "bill">
                            @foreach($cart as $value)
                                    <input type = "hidden"value =" {{$result += ($value['price']*$value['quantity'])}}">
                                            <tr id="item_id">
                                                <td class="col-sm-8 col-md-6">
                                                <div class="media">
                                                    <a class="thumbnail pull-left" href="#"> <img class="media-object" src="upload/{{$value['image']}}" id="tank"> </a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">{{$value['name']}}</h4>
                                                        <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                                        <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                                                    </div>
                                                </div></td>
                                                <td class="col-sm-1 col-md-1" id="tanxhd">
                                                <input type="Number" class="form-control" value="{{$value['quantity']}}" min="0" required="Number" id="{{$value['id']}}" name = "quantity[]">
                                                </td>
                                                <input type = "hidden"value ="{{$value['price']}}" name = "price[]">
                                                <input type = "hidden"value ="{{$value['name']}}" name = "product_name[]">
                                                <input type = "hidden"value ="{{$value['quantity']*$value['price']}}" name = "total[]"id="total{{$value['id']}}">
                                                <td class="col-sm-1 col-md-1 text-center"<span id="price_{{$value['id']}}">{{$value['price']}}</span></td>
                                                <td class="col-sm-1 col-md-1 text-center"><span id="total_{{$value['id']}}">{{$value['quantity']*$value['price']}}</span></td>
                                                <td class="col-sm-1 col-md-1">
                                                <button type="button" class="btn btn-danger" id="id">
                                                    <span class="glyphicon glyphicon-remove"></span> Remove
                                                </button></td>
                                            </tr>
                            @endforeach
                    @endif
                    <tr>
                        <td> &nbsp; </td>
                        <td> &nbsp; </td>
                        <td> &nbsp; </td>
                        <td><h3>Total</h3></td>
                     
                        <input id ="monney" type = "hidden"value ="{{number_format($result,0)}}" name = "subTotal">
                        <td class="text-right"><h3><strong id="stotal" id = "smonney">{{number_format($result,0)}}</strong></h3></td>

                    </tr>
                    <tr>
                        <td> &nbsp; </td>
                        <td> &nbsp; </td>
                        <td> &nbsp; </td>
                        <td>
                        <button type="button" class="btn btn-default"><a href="/Home">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </a></button></td>
                        <td>
                         @if(Session::has('product'))
                        <button id="btn1" type="submit" class="btn btn-success" id="btn_payment">
                        Checkout
                        </button>
                        @endif
                        {{--  <a id="link" class="den" target="_blank" href="https://www.nganluong.vn/button_payment.php?receiver=tanltps04690@fpt.edu.vn&product_name={{$bill_code}}&price={{$result}}&return_url=admin.php?c=home&comments=thanh cong"> Checkout</a> <span class="glyphicon glyphicon-play"></span>  --}}
 
                    </td>

                    </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>


    <script>
      var item = [];  
       
      $(":input").bind('keyup mouseup', function () {
        
        var sum=0;
        var id =  $(this).attr('id'); 
        var quantity = $(this).val();
        var price = $('#price_'+id).text();
        var total = $('#total_'+id).text(price*quantity);
        var total = $('#total'+id).val(price*quantity);
         @if(Session::has('product'))
            @foreach($cart as $val)
               var idtpm = {{$val['id']}};
               sum+=parseInt($('#total_'+idtpm).text());
            @endforeach
        @endif
            // sum+={{$result}};
            $("#monney").val(sum);
        $('#stotal').text(sum.toLocaleString());
        
      });   
      $("button").bind("click",function(){
        $("#item_"+$(this).attr("id")).remove();
      });
   
       </script>

@endsection