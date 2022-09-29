<?php

function password_encryption($password) {

    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234567891011121';

    $encryption_key = "Sam&Sam-FabFour";

// Use openssl_encrypt() function to encrypt the data
    $encryption = openssl_encrypt($password, $ciphering, $encryption_key, $options, $encryption_iv);


    return $encryption;
}

function password_decryption($password) {

    $decryption_iv = '1234567891011121';
    $options = 0;
    $ciphering = "AES-128-CTR";

    $decryption_key = "Sam&Sam-FabFour";

// Use openssl_decrypt() function to decrypt the data
    $decryption = openssl_decrypt($password, $ciphering, $decryption_key, $options, $decryption_iv);


    return $decryption;
}

?>
