<?php
$errors = $data['errors'] ?? [];
$success = $data['success'] ?? false;
$formData = $data['form_data'] ?? [];
?>




<main>
    <section class="section">
        <div class="container">
            <h1 class="section-title">Nous Contacter</h1>
            <p style="text-align: center; max-width: 600px; margin: -2rem auto 3rem;">
                Une question ? Une suggestion ? Remplissez le formulaire ci-dessous et notre équipe vous répondra dans les plus brefs délais.
            </p>

            <?php if ($success): ?>
                <div class="alert alert-success">
                    Votre message a bien été envoyé. Nous vous répondrons dans les plus brefs délais.
                </div>
            <?php else: ?>
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <strong>Oups !</strong> Il y a eu des erreurs dans votre formulaire :
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form class="contact-form" action="#" method="POST">
                <div class="form-group">
                    <label for="name">Nom complet</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?= htmlspecialchars($formData['name'] ?? '') ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($formData['email'] ?? '') ?>" required>
                </div>
                <div class="form-group">
                    <label for="subject">Sujet</label>
                    <input type="text" id="subject" name="subject" class="form-control" value="<?= htmlspecialchars($formData['subject'] ?? '') ?>" required>
                </div>
                <div class="form-group">
                    <label for="message">Votre message</label>
                    <textarea id="message" name="message" class="form-control" rows="5" required><?= htmlspecialchars($formData['message'] ?? '') ?></textarea>
                </div>
                <div style="text-align: center;">
                    <button type="submit" class="btn">Envoyer le message</button>
                </div>
            </form>

            <?php endif; ?>
        </div>
    </section>
</main>

