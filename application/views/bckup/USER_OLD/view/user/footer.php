






 </div>
          <!-- /.row -->
   </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
 <footer class="footer">
      <div class="container">
        <p class="text-muted"><center>CaGOn | Canteen Go Online Store</center></p>
      </div>
    </footer>
    
<script type="text/javascript">
      var open = document.getElementById('hamburger');
var changeIcon = true;

open.addEventListener("click", function(){

    var overlay = document.querySelector('.overlay');
    var nav = document.querySelector('nav');
    var icon = document.querySelector('.menu-toggle i');

    overlay.classList.toggle("menu-open");
    nav.classList.toggle("menu-open");

    if (changeIcon) {
        icon.classList.remove("fa-bars");
        icon.classList.add("fa-times");

        changeIcon = false;
    }
    else {
        icon.classList.remove("fa-times");
        icon.classList.add("fa-bars");
        changeIcon = true;
    }
});
    </script>

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

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
} 
</script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <script src="<?php echo base_url()?>assets/user/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/user/js/arf.js"></script>
    <script src="<?php echo base_url()?>assets/user/js/prs.js"></script>
    <script src="<?php echo base_url()?>assets/user/js/validation.js"></script>
    <script src="<?php echo base_url()?>assets/user/jquery/jquery-ui.js"></script>
    <script src="<?php echo base_url()?>assets/user/jquery/jquery.validate.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url()?>assets/user/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo base_url()?>assets/user/bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url()?>assets/user/asie/js/ie10-viewport-bug-workaround.js"></script>
    
<script type="text/javascript" src="<?php echo base_url('jquery.min.js');?>"></script>
    <script src="<?php echo base_url('assets/as/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('assets/as/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/as/js/responsive-slider.js');?>"></script>
    <script src="<?php echo base_url('assets/as/js/wow.min.js');?>"></script>
    <script src="<?php echo base_url('assets/as/vendor/datatables/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/as/vendor/datatables-plugins/dataTables.bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/as/vendor/datatables-responsive/dataTables.responsive.js');?>"></script>
    <script src="<?php echo base_url()?>assets/user/jquery/jquery-3.2.1.min.js"></script>
 <script src="<?php echo base_url()?>assets/user/js/arf.js"></script>
 <script src="<?php echo base_url()?>assets/user/js/prs.js"></script>
 <script src="<?php echo base_url()?>assets/user/js/validation.js"></script>
 <script src="<?php echo base_url()?>assets/user/jquery/jquery-ui.js"></script>
 <script src="<?php echo base_url()?>assets/user/jquery/jquery.validate.min.js"></script>
 <script>window.jQuery || document.write('<script src="<?php echo base_url()?>assets/user/vendor/jquery.min.js"><\/script>')</script>
 <script src="<?php echo base_url()?>assets/user/bootstrap/js/bootstrap.min.js"></script>
 <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 <script src="<?php echo base_url()?>assets/user/asie/js/ie10-viewport-bug-workaround.js"></script>
 <script>
	$(document).ready(function(){
		$('#seblak').DataTable({
            "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]]
        });
	});
</script>
<script>
	$(document).ready(function(){
		$('#sebla').DataTable({
            "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]]
        });
	});
</script>
 <script>
     $(document).ready(function(){
         $('#sebl').DataTable({
             "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]]
         });
     });
 </script>
 <script>
     $(document).ready(function(){
         $('#seb').DataTable({
             "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]]
         });
     });
 </script> 
   </body>
</html>
