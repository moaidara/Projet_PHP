<?php
  require_once("../../../../Model/ListeRepository.php");

  $listeRepository = new ListeRepository();
  $etud = $listeRepository->listeStudent();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / General - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="public/templates/template_admin/NiceAdmin/assets/img/favicon.png" rel="icon">
  <link href="public/templates/template_admin/NiceAdmin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="public/templates/template_admin/NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="public/templates/template_admin/NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="public/templates/template_admin/NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="public/templates/template_admin/NiceAdmin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="public/templates/template_admin/NiceAdmin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="public/templates/template_admin/NiceAdmin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="public/templates/template_admin/NiceAdmin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="public/templates/template_admin/NiceAdmin/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php require_once("../../../sections/admin/header.php")?>
  

  <!-- ======= Sidebar ======= -->
  <?php require_once("../../../sections/admin/sidebare.php")?>

  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>General Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">General</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
 

        <div class="col-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">liste des etudiants</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">adresse</th>
                    <th scope="col">mail</th>
                    <th scope="col">matricule</th>
                    <th scope="col">tel</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($etud)): ?>
                    <?php foreach ($etud as $etud): ?>
                        <tr>
                            <td><?= htmlspecialchars($etud['id']) ?></td>
                            <td><?= htmlspecialchars($etud['nom']) ?></td>
                            <td><?= htmlspecialchars($etud['prenom']) ?></td>
                            <td><?= htmlspecialchars($etud['adresse']) ?></td>
                            <td><?= htmlspecialchars($etud['email']) ?></td>
                            <td><?= htmlspecialchars($etud['tel']) ?></td>
                            <td><?= htmlspecialchars($etud['matricule']) ?></td>
                            <td>
				                    <!-- <li class="breadcrumb-item">
                            </li> -->

                              <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-alert">
                                <i class="bi bi-pencil-square"></i>
                              </button>
                              <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-alert">
                                <i class="bi bi-archive"></i>
                              </button>
                              
                            </td>
                        </tr>
                    <?php endforeach; ?>
                  <?php else: var_dump($etud)?>
                    
                    <tr>
                        <td colspan="8">Aucun étudiant trouvé.</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
  <!-- #modal-edit-student  -->
	<div class="modal fade" id="modal-alert">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Alert Header</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger m-b-0">
            <h5><i class="fa fa-info-circle"></i> Alert Header</h5>
            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="javascript:;" class="btn btn-danger" data-dismiss="modal">Action</a>
        </div>
      </div>
    </div>
  </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="public/templates/template_admin/NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="public/templates/template_admin/NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="public/templates/template_admin/NiceAdmin/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="public/templates/template_admin/NiceAdmin/assets/vendor/echarts/echarts.min.js"></script>
  <script src="public/templates/template_admin/NiceAdmin/assets/vendor/quill/quill.js"></script>
  <script src="public/templates/template_admin/NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="public/templates/template_admin/NiceAdmin/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="public/templates/template_admin/NiceAdmin/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="public/templates/template_admin/NiceAdmin/assets/js/main.js"></script>

</body>

</html>
