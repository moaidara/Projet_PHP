<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire d'Évaluation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="mb-4 text-center">Formulaire d'Évaluation</h2>
            <form action="evaluationMainController" method="POST">
                <!-- Champ Matière -->
                <div class="mb-3">
                    <label for="matiere" class="form-label">Matière</label>
                    <input type="text" class="form-control" id="matiere" name="matiere" required>
                </div>

                <!-- Champ Semestre -->
                <div class="mb-3">
                    <label for="semestre" class="form-label">Semestre</label>
                    <select class="form-select" id="semestre" name="semestre" required>
                        <option value="1">Semestre 1</option>
                        <option value="2">Semestre 2</option>
                    </select>
                </div>

                <!-- Champ Type -->
                <div class="mb-3">
                    <label for="type" class="form-label">Type d'Évaluation</label>
                    <select class="form-select" id="type" name="type" required>
                        <option value="devoir">Devoir</option>
                        <option value="examen">Examen</option>
                    </select>
                </div>

                <!-- Bouton de soumission -->
                <button type="submit" class="btn btn-primary w-100" name="frmAddEvaluation">Soumettre</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>