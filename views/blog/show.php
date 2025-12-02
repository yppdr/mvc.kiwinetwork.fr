
<main>
    <section class="section">
        <div class="container">
            <h1 class="section-title"><?= htmlspecialchars($post->title) ?></h1>
            <p class="post-meta">Publié le <?= date('d/m/Y à H:i', strtotime($post->created_at)) ?></p>

            <img src="<?= htmlspecialchars($post->img) ?>" alt="<?= htmlspecialchars($post->title) ?>" class="post-header-image">

            <article class="post-content">
                <?= $post->content ?>
            </article>

            <a href="<?= BASE_URL ?>blog" style="display: inline-block; margin-top: 2em;">&larr; Retour à la liste des articles</a>
        </div>
    </section>
</main>
