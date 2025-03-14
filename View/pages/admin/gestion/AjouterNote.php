<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire de Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="mb-4 text-center">Saisie des Notes</h2>
            <form action="noteMainController" method="POST">
                
                <!-- Champ Matricule Étudiant -->
                <div class="mb-3">
                    <label for="id_evaluation" class="form-label">ID Étudiant</label>
                    <input type="number" class="form-control" id="id_etudiant" name="id_etudiant" required>
                </div>

                <!-- Champ ID Évaluation -->
                <div class="mb-3">
                    <label for="id_evaluation" class="form-label">ID Évaluation</label>
                    <input type="number" class="form-control" id="id_evaluation" name="id_evaluation" required>
                </div>

                <!-- Champ Note -->
                <div class="mb-3">
                    <label for="note" class="form-label">Note</label>
                    <input type="number" class="form-control" id="note" name="note" min="0" max="20" step="0.1" required>
                </div>

                <!-- Bouton de soumission -->
                <button type="submit" class="btn btn-primary w-100" name="frmAddNote">Enregistrer</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
