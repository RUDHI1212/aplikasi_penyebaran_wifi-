<script>
	function openCity(evt, cityName) {
		// Declare all variables
		var i, tabcontent, tablinks;

		// Get all elements with class="tabcontent" and hide them
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}

		// Get all elements with class="tablinks" and remove the class "active"
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}

		// Show the current tab, and add an "active" class to the link that opened the tab
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
	}

</script>
<script src="<?php echo base_url()?>assets/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url()?>assets/sweetalert/script.js"></script>
<script src="<?php echo base_url()?>assets/bootstrap3/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/bootstrap3/js/demo/datatables-demo.js"></script>
<script src="<?php echo base_url()?>assets/bootstrap3/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/bootstrap3/vendor/jquery/jquery.min.js"></script>
      
      <script src="<?php echo base_url()?>assets/bootstrap3/vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url()?>assets/bootstrap3/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>
	function myFunction() {
		alert("Silahkan Login Untuk Melanjutkan Transaksi");
	}

</script>
</section>
<footer class="footer">
	<div class="container">
		<p class="text-muted">
			<center>Copyright&copy Diskominfo Karawang</center>
		</p>
	</div>
</footer>
</body>

</html>
