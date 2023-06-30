<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form>
  <input type="text" name="name" placeholder="Enter the Name" id="name" ><br><br>
  <input type="text" name="amount" placeholder="Enter the amount" id="amount" ><br><br>
  <input type="button" name="button" value="pay now" onclick="makePayment()"><br><br>
</form>
<script>
  function makePayment()
  {
    var name= $("#name").val();
    var amount = $("#amount").val();
    var options = {
      "key": "rzp_test_fzsgeWdP9N4ayW", // Enter the Key ID generated from the Dashboard
      "amount": amount * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise.
      "currency": "INR",
      "name": name,
      "description": "Test Transaction",
      "image": "cta_icon",
      "handler": function (response){
      jQuery.ajax({
        type:"POST",
        url:"payment.php",
        data:"pay_id="+response.razorpay_payment_id+"&amount="+amount+"&name="+name,
        success:function(result)
        {
            window.location.href="success.php";
        }
      })
      },
  };
  var rzp1 = new Razorpay(options);
      rzp1.open();
  }

</script>
