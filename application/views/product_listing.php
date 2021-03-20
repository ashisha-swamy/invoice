<!DOCTYPE html>
<html lang="en">
<head>
  <title>Invoice</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css" media="print">
    #lb1,#submit{
    display:none;
    }
    </style>
</head>
<body>
  <div class="container" id='lb1' >
    <h5 style="margin-top:50px;">Enter Items</h5>
     <a href="<?php echo base_url(); ?>logout" style="float: right;">Logout</a>
  <form id="form_id">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="" placeholder="name" required="required" autofocus="autofocus" />
    <label for="price">Price:</label>
    <input type="text" id="price" name="price" value="" required="required" autofocus="autofocus" />
    <label for="quantity">Quantity:</label>
    <input type="text" id="qty" name="qty" value="" required="required" autofocus="autofocus" />
    <label for="tax">Tax:</label>
    <select name="tax" id="tax">
      <option value="">select</option>
      <option value="1">1%</option>
      <option value="5">5%</option>
      <option value="10">10%</option>
    </select>

    <input type="button" value="submit" id="submit-button" />
  </form>

  <div id="table">
    <h5>Bill Details</h5>
    <table class="footable" border='1' id='t1'>
      <thead>
        <tr>
          <th>Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Subtotal</th>
          <th>Tax</th>
          <th>Subtotal(tax applied)</th>
          
        </tr>
      </thead>
      <tbody >

      </tbody>
    </table>
  </div>
  <form>
    <label><b>Grand Total:</b></label><p id='grnd'></p><br>
    <label><b>Discount:</b></label>
    <input type="radio" name="amnt"  value="percentage">
    <label>Percentage</label>
    <input type="radio" name="amnt"  value="amount">
    <label>Amount</label>
    <input type="radio" name="amnt"  value="nodis">
    <label>No Discount</label><br>
    <input type="text" value="" name='rs1' id='rs'><br>
    <label><h6>Total Price:-</h6> <p id='tot'></p></label>
  </form>
  
</div>
<!-- <form action="<?php //echo base_url(); ?>invoice">
    <input id="prod_name" name="prod_name" type="hidden" value="">
    <input id="prod_qty" name="prod_qty" type="hidden" value="">
    <input id="prod_price" name="prod_name" type="hidden" value="">
    <input type="submit" value="Generate Invoice" />
</form>
  -->
 <!--  <button type="button"   id="submit">Generate Invoice</button> 
</form> -->

<div class="container">
  <button type="button" data-toggle="modal" id="submit" data-target="#myModal">Generate Invoice</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 class="modal-title" style="text-align: center;">Invoice</h4>
        </div>
        <div class="modal-body">

          <table border='1' id='t2'>
          </table>
          <p id='gt'></p>
          <p id='dsc'></p>
          <p id='ttl'></p>
        </div>
        <div class="modal-footer">
          <button onclick="window.print()">Print</button>
          <button type="button"  data-dismiss="modal">Close</button>
          
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
<script type="text/javascript">
 var grand=0; var rst=0; var radioValue=0;
 $(document).ready(function(){

  $("#submit-button").click(function(){
    var data = $('#form_id').serializeArray();
    var obj = {};
    for (var i = 0, l = data.length; i < l; i++) {
      obj[data[i].name] = data[i].value;
    }
    var a=parseInt(obj['price']*obj['qty']);
    var b=parseInt(((obj['price']*obj['qty'])*obj['tax'])/100);
    var sum=a+b;
      //alert(grand);
      grand=grand+sum;
      var name=obj['name'];
      var qty=obj['qty'];
      var price='$'+obj['price'];
      var sub='$'+obj['price']*obj['qty'];
      var tax=obj['tax']+'%';
      var subtax=sum;

//alert(sum);
$('table.footable tbody').append('<tr><td>'+obj['name']+'</td><td>'+obj['qty']+'</td><td>'+obj['price']+'</td><td>$'+obj['price']*obj['qty']+'</td><td>'+obj['tax']+'%</td><td>'+sum+'$</td></tr>');
$("#name").val('');
$("#price").val('');
$("#qty").val('');
$("#tax").val('');
$("#grnd").html('$'+grand);


});

  $("input[type='radio']").click(function(){
    radioValue = $("input[name='amnt']:checked").val();

    if(radioValue=='percentage'){
      $('#rs').mouseleave(function(){
                //alert("Your are a - " + radioValue);
                //alert(grand);
               var  rs=$("#rs").val();
               var dis=grand-((grand*rs)/100);
                $("#tot").html('$'+dis);
                //var x=$("#rs").val()+'%';
                rst=rs+'%';
              });

    }
    else if(radioValue=='amount')
    {
      $('#rs').mouseleave(function(){
                //alert("Your are a - " + radioValue);
               var rs=$("#rs").val();
               var dis=grand-rs;
                //alert(dis);
                $("#tot").html('$'+dis);
                //var x='$'+$("#rs").val();
                rst='$'+rs;
              });

    }
    else if(radioValue=='nodis')
    {
        rst=0;
        $("#tot").html(grand);
    }
  });


  $("#submit").click(function () { 
    //alert(radioValue);
            if(radioValue=='' || radioValue==0) {         
         alert('Choose any discount');
         return false;
          
        }
        else 
        {
           //alert($('#t1').html());

           var txt=$('#t1').html();
           $('#t2').html(txt);
          // alert($("#grnd").html());

         
          //alert(j);
            var p="<b>Grand Total:</b>"+$("#grnd").html();
           $('#gt').html(p);
          
            var q="<b>Total Discount:</b>"+rst;
             $('#dsc').html(q);
           total=$("#tot").html();
           var s="<b>Total Amount:</b>"+$("#tot").html();
          $('#ttl').html(s);
        }
        }); 



});
</script>

</html>


