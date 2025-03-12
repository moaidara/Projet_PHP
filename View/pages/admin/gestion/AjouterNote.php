<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Note</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Ajouter une Note</h2>
            <form>
                <div class="mb-3">
                    <label for="studentId" class="form-label">ID de l'étudiant</label>
                    <input type="text" class="form-control" id="studentId" placeholder="Entrez l'ID" required>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Matière</label>
                    <input type="text" class="form-control" id="subject" placeholder="Entrez la matière" required>
                </div>
                <div class="mb-3">
                    <label for="grade" class="form-label">Note</label>
                    <input type="number" class="form-control" id="grade" placeholder="Entrez la note" min="0" max="20" step="0.1" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>