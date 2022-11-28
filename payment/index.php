<style>
#loading{
	position: absolute;
	top: 0;
	left: 0;
	bottom: 0;
	width: 100%;
	height: 100%;
	background-color: rgba(0,0,0,0.6);
}
</style>

<input type="text" name="name" id="name" placeholder="Your Name"><br><br>
<input type="email" name="email" id="email" placeholder="Your email ID"><br><br>
<input type="tel" name="mobile" id="mobile" placeholder="Your mobile number"><br><br>

<button id="rzp-button1" onClick="paynow()">Pay</button>
<div id="loading" style="visibility:hidden;"></div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
	function paynow()
	{
		document.getElementById("loading").style.visibility="visible";
		var name=document.getElementById("name").value;
		var email=document.getElementById("email").value;
		var mobile=document.getElementById("mobile").value;
		const xhttp = new XMLHttpRequest();
		xhttp.onload = function(){
		var orderID = this.responseText;
		document.getElementById("loading").style.visibility="hidden";
		var options = {
			"key": "rzp_test_8U89o9XERb7u1H", // Enter the Key ID generated from the Dashboard
			"amount": "100", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
			"currency": "INR",
			"name": "Acme Corp",
			"description": "Test Transaction",
			"image": "https://example.com/your_logo",
			"order_id": orderID,
			"callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
			"prefill": {
				"name": name,
				"email": email,
				"contact": mobile
			},
			"notes": {
				"address": "Razorpay Corporate Office"
			},
			"theme": {
				"color": "#3399cc"
			}
		};
		var rzp1 = new Razorpay(options);
			rzp1.open();
			}
			xhttp.open("GET","orders.php?name="+name+"&email="+email);
			xhttp.send();
	}
</script>
