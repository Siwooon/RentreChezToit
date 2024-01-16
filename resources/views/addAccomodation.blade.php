<!-- resources/views/add.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une accomodation</title>
</head>
<body>

    <h1>Ajouter une accomodation</h1>

    <form method="post" action="{{ route('accomodation.store') }}">
        @csrf <!-- Ajouter le jeton CSRF pour protéger le formulaire -->

        <label for="address">Adresse :</label>
        <input type="text" name="address" required>
        <br>
        <br>

        <label for="bedrooms">Nombre de chambres :</label>
        <input type="number" min="0" name="bedrooms" required>
        <br>
        <br>
        <label for="bathrooms">Nombre de salles de bains :</label>
        <input type="number" name="bathrooms" required>
        <br>
        <br>
        
        <label for="living_space">Surface habitable :</label>
        <input type="number" name="living_space" required>
        <br>
        <br>

        <label for="land_area">Surface du terrain :</label>
        <input type="number" name="land_area" required>
        <br>
        <br>

        <label for="description">Description :</label>
        <input type="text" name="description" required>
        <br>
        <br>

        <label for="garage">Garage :</label>
        <input type="checkbox" name="garage">
        <br>
        <br>

        <label for="balcony">Balcon :</label>
        <input type="checkbox" name="balcony">
        <br>
        <br>

        <label for="terrace">Terrase :</label>
        <input type="checkbox" name="terrace">
        <br>
        <br>

        <label for="elevator">Ascenseur :</label>
        <input type="checkbox" name="elevator">
        <br>
        <br>

        <label for="energetic_class">Classe énergetique :</label>
        <input type="text" name="energetic_class">
        <br>
        <br>

        <label for="cave">Cave :</label>
        <input type="checkbox" name="cave">
        <br>
        <br>

        <!-- Ajoutez d'autres champs du formulaire selon vos besoins -->

        <button type="submit">Ajouter</button>
    </form>

</body>
</html>
