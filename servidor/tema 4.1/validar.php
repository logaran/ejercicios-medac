<?php
function validateUser($user) {
    $pattern = '/^[a-z0-9 ]{6,15}$/i';
    return (bool)preg_match($pattern, $user);
}
function validatePassword($password) {
    $pattern = '/^[a-z]{7}$/i';
    return (bool) preg_match($pattern, $password);
}

echo "El usuario valida: " . (validateUser('Paco Perez') ? "True" : "False");
echo "El password valida: " . (validatePassword('lgrn1598') ? "True" : "False");
?>