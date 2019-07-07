<?php
/**
 * @param string $text
 * @return array
 */
function getPasswordSumAndWallet(string $text): array {
    // пароль
    preg_match('/(\d{4})/', $text, $password);

    // сколько спишется
    preg_match('/(\d+[\,|\.]\d+\s?р\.?)/', $text, $sum);

    // номер кошелька
    preg_match('/(\d{15})/', $text, $wallet);

    return [
        isset($password[0]) ? current($password) : null,
        isset($sum[0]) ? current($sum) : null,
        isset($wallet[0]) ? current($wallet) : null
    ];
}

$text = "Пароль: 9159
Спишется 111,56р.
Перевод на счет 410012156350833";
/**
 * @var string $password
 * @var string $sum
 * @var string $wallet
 */
[$password, $sum, $wallet] = getPasswordSumAndWallet($text);

var_dump($password, $sum, $wallet);