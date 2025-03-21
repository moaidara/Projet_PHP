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

                              <button class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#modal-alert"
                                  data-id="<?= htmlspecialchars($etud['id']) ?>"
                                  data-nom="<?= htmlspecialchars($etud['nom']) ?>"
                                  data-prenom="<?= htmlspecialchars($etud['prenom']) ?>"
                                  data-adresse="<?= htmlspecialchars($etud['adresse']) ?>"
                                  data-email="<?= htmlspecialchars($etud['email']) ?>"
                                  data-matricule="<?= htmlspecialchars($etud['matricule']) ?>"
                                  data-tel="<?= htmlspecialchars($etud['tel']) ?>">
                                <i class="bi bi-pencil-square"></i>
                              </button>
                              <button class="btn btn-danger btn-sm delete-stu" data-bs-toggle="modal" data-bs-target="#Delete"
                                data-id="<?= htmlspecialchars($etud['id']) ?>">
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
          <h4 class="modal-title">Modifier</h4>
        </div>
        <div class="modal-body">
            <form action="listeMainController" method="post" enctype="multipart/form-data">
                <input type="hidden" id="student-id" name="id">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" class="form-control" id="adresse" name="adresse" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="matricule" class="form-label">Matricule</label>
                        <input type="text" class="form-control" id="matricule" name="matricule" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="tel" class="form-label">Téléphone</label>
                    <input type="tel" class="form-control" id="tel" name="tel" required>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger" name="frmModify">Action</button>
                </div>
            </form>

        </div>
        
      </div>
    </div>
  </div>
    <div class="modal fade" id="Delete" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="confirmDeleteLabel">Confirmer la suppression</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  
                  <p>Êtes-vous sûr de vouloir supprimer ? Cette action est irréversible.</p>
                  <form action="listeMainController" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="student-id" name="id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger" name = "frmDelete">Confirmer</button>
                    </div>
                  </form>  
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
      document.addEventListener("DOMContentLoaded", function () {
          document.querySelectorAll(".edit-btn").forEach(button => {
              button.addEventListener("click", function () {
                  document.getElementById("student-id").value = this.dataset.id;
                  document.getElementById("nom").value = this.dataset.nom;
                  document.getElementById("prenom").value = this.dataset.prenom;
                  document.getElementById("adresse").value = this.dataset.adresse;
                  document.getElementById("email").value = this.dataset.email;
                  document.getElementById("matricule").value = this.dataset.matricule;
                  document.getElementById("tel").value = this.dataset.tel;
              });
          });
          document.querySelectorAll(".delete-stu").forEach(button => {
            button.addEventListener("click", function () {
                document.querySelector("#Delete #student-id").value = this.dataset.id;
            });
        });
      });
  </script>
</body>

</html>