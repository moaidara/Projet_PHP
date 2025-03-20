<!DOCTYPE html>
<html lang="en">
 <!-- ======= Section Head ======= -->
 <?php  require_once ("View/sections/admin/head.php")?>

<body>
<?php require_once("View/sections/admin/verifierSession.php")?>
  <!-- ======= Section Header ======= -->
  <?php  require_once ("View/sections/admin/header.php")?>

  <!-- ======= Section Sidebar ======= -->
  <?php  require_once ("View/sections/admin/sidebare.php")?> 

  <main id="main" class="main">
    
 <!-- ======= Section Menu ======= -->

  <?php  require_once ("View/sections/admin/menu.php")?>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php  require_once ("View/sections/admin/footer.php")?>

  <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
  

  <!-- Section script -->
  <?php  require_once ("View/sections/admin/script.php")?>
  <?php  require_once("view/sections/admin/msgErrorOrSuccess.php")?>

</body>

</html>