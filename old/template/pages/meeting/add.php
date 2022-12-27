<form method="post">

    <!-- Grid -->
    <div class="grid">

        <label for="title">
            Titre
            <input type="text" id="title" name="title" placeholder="Titre" required>
        </label>

        <label for="date">
            Date
            <input type="datetime-local" id="date" name="date" placeholder="date" required>
        </label>

    </div>

    <label for="details">Details</label>
    <input type="textarea" id="details" name="details" placeholder="Details">
    <small>Vous pouvez saisir des informations concernant le rendez-vous</small>

    <label for="important">
        <input type="checkbox" id="important" name="important">
        Ce rendez-vous est t'il important ?
    </label>


    <!-- Button -->
    <button type="submit">Ajouter</button>

</form>