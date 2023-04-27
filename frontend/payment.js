    function pay_now(){
        var name = jQuery('#name').val();
        var amt = jQuery('#amt').val();
        jQuery.ajax({
                type:'post',
                url:'payment_process.php',
                data:"amt="+amt+"&name="+name,
                success:function(result){
                    var options = {
                    "key": "rzp_test_Da3fkmwZgPMLb9", 
                    "amount": amt*100, 
                    "currency": "INR",
                    "name": "Dipanshu Sharma",
                    "description": "Test Transaction",
                    "image": "https://www.google.com/imgres?imgurl=https%3A%2F%2Fvariety.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fdoraemon2.jpg%3Fw%3D1024&tbnid=qHRNPQW_vw9e-M&vet=12ahUKEwiBnt64orP-AhVhXHwKHWHAACMQMyggegUIARC5Ag..i&imgrefurl=https%3A%2F%2Fvariety.com%2F2014%2Ftv%2Fasia%2Ficonic-japanese-cartoon-doraemon-acquired-by-disney-1201176265%2F&docid=Rp8scMCoK4uAzM&w=1024&h=745&q=doraemon&ved=2ahUKEwiBnt64orP-AhVhXHwKHWHAACMQMyggegUIARC5Ag",
                    "handler": function (response){
                        jQuery.ajax({
                                type:'post',
                                url:'payment_process.php',
                                data:"payment_id="+response.razorpay_payment_id,
                                success:function(result){
                                    window.location.href="thank_you.php";
                                }
                            });
                        }
                    }; 
    var rzp1 = new Razorpay(options);
        rzp1.open();
        // e.preventDefault();
                }
             });

        
    
 }