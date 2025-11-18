<h2>Administration des articles</h2>

<a href="<?= BASE_URL ?>admin/posts/create" style="background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;">
    &#43; Créer un nouvel article
</a>

<table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
    <thead>
        <tr style="text-align: left; background-color: #f2f2f2;">
            <th style="padding: 12px; border-bottom: 1px solid #ddd;">ID</th>
            <th style="padding: 12px; border-bottom: 1px solid #ddd;">Titre</th>
            <th style="padding: 12px; border-bottom: 1px solid #ddd;">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td style="padding: 12px; border-bottom: 1px solid #ddd;"><?= $post->id ?></td>
                <td style="padding: 12px; border-bottom: 1px solid #ddd;"><?= htmlspecialchars($post->title) ?></td>
                <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                    <a href="<?= BASE_URL ?>blog/<?= $post->slug ?>" target="_blank">Voir</a> |
                    <a href="<?= BASE_URL ?>admin/posts/edit/<?= $post->id ?>">Modifier</a> |
                    <a href="<?= BASE_URL ?>admin/posts/delete/<?= $post->id ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')" style="color: #dc3545;">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
