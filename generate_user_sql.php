<?php

// Script pour générer une commande SQL d'insertion/mise à jour d'utilisateur.
// Utilisation : php generate_user_sql.php <email> <mot_de_passe>

if ($argc < 3) {
    echo "Utilisation : php generate_user_sql.php <email> <mot_de_passe>\n";
    exit(1);
}

$email = $argv[1];
$password = $argv[2];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

echo "-------------------------------------------------------------------\n";
echo "Copiez et exécutez la commande SQL ci-dessous dans votre client MySQL :\n";
echo "-------------------------------------------------------------------\n\n";
echo "INSERT INTO users (email, password) VALUES ('" . $email . "', '" . $hashedPassword . "')\n";
echo "ON DUPLICATE KEY UPDATE password = '" . $hashedPassword . "';\n\n";
echo "-------------------------------------------------------------------\n";

?>
