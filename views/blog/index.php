


<main>
    <section class="section">
        <div class="container">
            <h1 class="section-title">Notre Blog</h1>
            <p style="text-align: center; max-width: 600px; margin: -2rem auto 3rem;">
                Conseils, actualités et tutoriels de l'équipe KiwiNetwork.
            </p>

            <div class="post-list">
                <?php if (empty($posts)): ?>
                    <p>Aucun article à afficher pour le moment.</p>
                <?php else: ?>

                <?php foreach ($posts as $post): ?>

                <article class="post-item">
                    <div class="post-thumbnail">
                        <a href="<?= BASE_URL ?>"><img src="<?= htmlspecialchars($post->img) ?>" alt="<?= htmlspecialchars($post->title) ?>"></a>
                    </div>
                    <div class="post-content-summary">
                        <h3><a href="<?= BASE_URL ?>blog/<?= htmlspecialchars($post->slug) ?>"><?= htmlspecialchars($post->title) ?></a></h3>
                        <p class="post-meta">Publié le <?= date('d/m/Y', strtotime($post->created_at)) ?></p>

                        <p><?= nl2br(substr($post->content, 0, 100)) ?>...</p>
                    </div>
                </article>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>

        </div>
    </section>
</main>
