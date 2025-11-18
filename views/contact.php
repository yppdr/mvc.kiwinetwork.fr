<?php
$errors = $data['errors'] ?? [];
$success = $data['success'] ?? false;
$formData = $data['form_data'] ?? [];
?>

<h2>Contactez-nous</h2>

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

    <form action="/contact" method="POST">
        <div class="form-group">
            <label for="name">Votre nom</label>
            <input type="text" id="name" name="name" class="form-control" value="<?= htmlspecialchars($formData['name'] ?? '') ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Votre email</label>
            <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($formData['email'] ?? '') ?>" required>
        </div>
        <div class="form-group">
            <label for="subject">Sujet</label>
            <input type="text" id="subject" name="subject" class="form-control" value="<?= htmlspecialchars($formData['subject'] ?? '') ?>" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" class="form-control" rows="5" required><?= htmlspecialchars($formData['message'] ?? '') ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
<?php endif; ?>