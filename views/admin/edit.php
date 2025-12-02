<h2>Modifier l'article</h2>

<form action="<?= BASE_URL ?>admin/posts/update/<?= $post->id ?>" method="POST">
    <div style="margin-bottom: 15px;">
        <label for="title" style="display: block; margin-bottom: 5px;">Titre</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($post->title) ?>" required style="width: 100%; padding: 8px; font-size: 1em;">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="img" style="display: block; margin-bottom: 5px;">Lien img</label>
        <input type="text" id="img" name="img" value="<?= htmlspecialchars($post->img) ?>" required style="width: 100%; padding: 8px; font-size: 1em;">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="content" style="display: block; margin-bottom: 5px;">Contenu</label>
        <textarea id="content" name="content" rows="15" required style="width: 100%; padding: 8px; font-size: 1em; line-height: 1.6;"><?= htmlspecialchars($post->content) ?></textarea>
    </div>
    <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Enregistrer les modifications</button>
    <a href="<?= BASE_URL ?>admin" style="margin-left: 15px;">Annuler</a>
</form>

<script src="https://cdn.tiny.cloud/1/95fe82qelte7hc9h7eor548g26zt5kcphmk9svll2ygj0ebl/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#content',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });
</script>
