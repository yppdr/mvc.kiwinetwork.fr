
<main>
    <section class="section">
        <div class="container">
            <h1 class="section-title"><?= htmlspecialchars($post->title) ?></h1>
            <p class="post-meta">Publié le <?= date('d/m/Y à H:i', strtotime($post->created_at)) ?></p>

            <img src="<?= BASE_URL ?>assets/img/post-thumbnail.svg" alt="Illustration d'un article de blog" class="post-header-image">

            <article class="post-content">
                <?= nl2br(htmlspecialchars($post->content)) ?>
            </article>

            <a href="<?= BASE_URL ?>blog" style="display: inline-block; margin-top: 2em;">&larr; Retour à la liste des articles</a>
        </div>
    </section>
</main>
