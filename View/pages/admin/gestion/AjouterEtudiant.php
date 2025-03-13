<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Étudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Ajouter un Étudiant</h2>
            <form action="etudiantMainController" method = "POST" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" placeholder="Entrez le nom" name="nom" required>
                    </div>
                    <div class="col-md-6">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" placeholder="Entrez le prénom" name="prenom" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" class="form-control" id="adresse" placeholder="Entrez l'adresse" name="adresse" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Entrez l'email" name="email" required>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="matricule" class="form-label">Matricule</label>
                        <input type="text" class="form-control" id="matricule" placeholder="Entrez le matricule" name="matricule" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tel" class="form-label">Téléphone</label>
                        <input type="tel" class="form-control" id="tel" placeholder="Entrez le téléphone" name="tel" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo" required>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="created_by" class="form-label">Créé par</label>
                        <input type="text" class="form-control" id="created_by" placeholder="Créé par" name="created_by" required>
                    </div>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary" name = "frmAddStudent">Ajouter</button>
                    <button href="reset" class="btn btn-danger">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>