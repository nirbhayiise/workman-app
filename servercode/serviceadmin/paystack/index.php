








<script src="https://js.paystack.co/v1/inline.js"></script>
<!-- place below the html form -->
<script>


  function payWithPaystack(){
      
      var email = document.getElementById("email").value;
      var amount = document.getElementById("amount").value;
      
    var handler = PaystackPop.setup({
      key: 'pk_test_34ce7d6803a8a126ffbfefe36d82aef0bbf85c6c',
      email: email,
      amount: amount,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "8076986642",
                variable_name: "8076986642",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
  
  // Define the JavaScript method
function callMethodWithParam() {
  // Get the parameter from the URL
  var email = new URLSearchParams(window.location.search).get('email');
  var amount = new URLSearchParams(window.location.search).get('amount');
    //alert(email);
        var handler = PaystackPop.setup({
      key: 'pk_live_4010f9e181720f41715b6135ed03bff0fa1da1f5',
      email: email,
      amount: amount,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "8076986642",
                variable_name: "8076986642",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
    
  // Call your method with the parameter
  myJavaScriptObject.myMethod(email);
  myJavaScriptObject.myMethod(amount);
}
  window.onload = callMethodWithParam;
</script>