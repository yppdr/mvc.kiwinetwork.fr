<h2>Créer un nouvel article</h2>

<form action="<?= BASE_URL ?>admin/posts/store" method="POST">
    <div style="margin-bottom: 15px;">
        <label for="title" style="display: block; margin-bottom: 5px;">Titre</label>
        <input type="text" id="title" name="title" required style="width: 100%; padding: 8px; font-size: 1em;">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="img" style="display: block; margin-bottom: 5px;">Lien IMG</label>
        <input type="text" id="img" name="img" required style="width: 100%; padding: 8px; font-size: 1em;">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="content" style="display: block; margin-bottom: 5px;">Contenu</label>
        <textarea id="content" name="content" rows="15" required style="width: 100%; padding: 8px; font-size: 1em; line-height: 1.6;"></textarea>
    </div>
    <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Enregistrer</button>
    <a href="<?= BASE_URL ?>admin" style="margin-left: 15px;">Annuler</a>
</form>
