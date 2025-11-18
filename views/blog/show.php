<article>
    <h2><?= htmlspecialchars($post->title) ?></h2>
    <p><em>Publié le <?= date('d/m/Y à H:i', strtotime($post->created_at)) ?></em></p>
    
    <div class="post-content" style="line-height: 1.7;">
        <?= nl2br(htmlspecialchars($post->content)) ?>
    </div>
</article>

<a href="<?= BASE_URL ?>blog" style="display: inline-block; margin-top: 2em;">&larr; Retour à la liste des articles</a>
