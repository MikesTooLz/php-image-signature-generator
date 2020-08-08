<?php header('Content-Type: text/html; charset=utf-8'); ?>

<html>

	<head>

		<title>Email Signature Image Generator</title>

		<link rel="stylesheet" type="text/css" href="css/style.css">

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>

		<script type="text/javascript">

			$(function() {

			$("#submit").click(function() {

				var address1 = encodeURIComponent($("#address1").val());
				var address2 = encodeURIComponent($("#address2").val());
				var web = encodeURIComponent($("#web").val());
				var title = encodeURIComponent($("#title").val());
				var name = encodeURIComponent($("#name").val());
				var surname = encodeURIComponent($("#surname").val());
				var phone = encodeURIComponent($("#phone").val());
				var extension = encodeURIComponent($("#extension").val());
				var desk = encodeURIComponent($("#desk").val());
				var email = encodeURIComponent($("#email").val());

				var dataString = 'address1=' + address1 + '&address2=' + address2 + '&web=' + web + '&title=' + title + '&name=' + name + '&surname=' + surname + '&phone=' + phone + '&extension=' + extension + '&desk=' + desk + '&email=' + email + '&submit=submit';

				if(address1=='' || address2=='' || web=='' || title=='' || name=='' || surname=='' || email=='') {

					$('.success').fadeOut(200).hide();
					$('.error').fadeOut(200).show();

				} else {

					$.ajax({
						type: "POST",
						url: "make-signature.php",
						data: dataString,
						success: function(data){
							$('.success').fadeIn(200).show();
							$('.error').fadeOut(200).hide();
							var base64Image = data;
							$('#signature').attr('src','data:image/jpeg;base64,'+base64Image);
						}
					});
				}

				return false;
				});
			});

		</script>

	</head>

	<body>

		<div id="container">

			<form autocomplete="off" enctype="multipart/form-data" method="post"  name="form">

				<div class="info">

					<h2>MDCPS - Email Signature Generator</h2>
					<span>Fill in the info below to generate your email signature.</span>

				</div>

				<ul>

					<li>
						<label>District</label>
						<div>
							<input id="address1" name="address1" type="text" value="Miami-Dade County Public Schools" tabindex="1" />
						</div>
					</li>
					
					<li>
						<label>Department</label>
						<div>
							<input id="address2" name="address2" type="text" value="Information Technology Services" tabindex="2" />
						</div>
					</li>

					<li>
						<label>Website</label>
						<div>
							<input id="web" name="web" type="text" value="www.dadeschools.net" tabindex="3" />
						</div>
					</li>

					<li>
						<label>Title</label>
						<div>
							<input id="title" name="title" type="text" value="Network Infrastructure & System Support" tabindex="4" />
						</div>
					</li>
					
					<li>
						<label>First Name</label>
						<div>
							<input id="name" name="name" type="text" value="Michael A." tabindex="5" />
						</div>
					</li>

					<li>
						<label>Last Name</label>
						<div>
							<input id="surname" name="surname" type="text" value="Muni" tabindex="6" />
						</div>
					</li>

					<li>
						<label>Desk Phone</label>
						<div>
							<input id="desk" name="desk" type="text" value="" tabindex="9" />
						</div>
					</li>
					
					<li>
						<label>Extension</label>
						<div>
							<input id="extension" name="extension" type="text" value="" tabindex="8" />
						</div>
					</li>
					
					<li>
						<label>Mobile Phone</label>
						<div>
							<input id="phone" name="phone" type="text" value="xxx-xxx-xxxx" tabindex="7" />
						</div>
					</li>
					<li>
						<label>Email</label>
						<div>
							<input id="email" name="email" type="text" value="MMuni@dadeschools.net" tabindex="10" />
						</div>
					</li>

				</ul>

				<div>					
					<input id="submit" type="submit" value="Generate Signature" tabindex="11" />
				</div>

			</form>

			<div class="error" style="display:none">Please fill out all fields.</div>

			<div  class="success" style="display:none">
				<img id="signature" />
			</div>

		</div>


</body>
</html>
