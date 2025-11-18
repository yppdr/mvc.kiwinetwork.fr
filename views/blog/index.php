<h2>Tous nos articles</h2>

<?php if (empty($posts)): ?>
    <p>Aucun article à afficher pour le moment.</p>
<?php else: ?>
    <?php foreach ($posts as $post): ?>
        <article>
            <h3>
                <a href="<?= BASE_URL ?>blog/<?= htmlspecialchars($post->slug) ?>">
                    <?= htmlspecialchars($post->title) ?>
                </a>
            </h3>
            <p><em>Publié le <?= date('d/m/Y', strtotime($post->created_at)) ?></em></p>
            <p><?= nl2br(htmlspecialchars(substr($post->content, 0, 200))) ?>...</p>
            <a href="<?= BASE_URL ?>blog/<?= htmlspecialchars($post->slug) ?>">Lire la suite</a>
        </article>
        <hr style="border: 0; border-top: 1px solid #eee; margin: 2em 0;">
    <?php endforeach; ?>
<?php endif; ?>
