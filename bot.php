<?php

include 'func.php'; // Функции
header('Content-Type: text/html; charset=utf-8'); // на всякий случай досообщим PHP, что все в кодировке UTF-8

$site_dir = dirname(dirname(__FILE__)).'/'; // корень сайта
$bot_token = '5161828494:AAG6goxCShQJNLMz5b9bY74ccNT4xNACCx4'; // токен бота
$data = json_decode(file_get_contents('php://input'), true); // весь ввод перенаправляем в $data и декодируем json-закодированные-текстовые данные в PHP-массив

// =============================================
// ====== ВСЁ ЧТО ВЫШЕ НЕ ТРОГАТЬ! ============
// =============================================

// ====== Наши переменные ============
$chat_id = $data['message']['from']['id']; // ID пользователя
$user_name = $data['message']['from']['username']; // Username пользователя
$first_name = $data['message']['from']['first_name']; // Имя
$last_name = $data['message']['from']['last_name']; // Фамилия
$text = trim($data['message']['text']); // Тело сообщения
$text_array = explode(" ", $text); // Массив с сообщением
$cmd = $text_array[0]; // Первое слово сообщения
$msg_array = array_slice($text_array, 1); // Массив с остальной частью сообщения
$msg = implode(" ", $msg_array); // Строка с остальной частью сообщения
// ====== *************** ============

// =============================================
// ====== Тут мы получили сообщение ============
// =============================================
if (!empty($data['message']['text'])) {
  if ($cmd == "/gif")
  {
    $matrix = getMatrixGif($msg, $chat_id);
    sendDocument($bot_token, $chat_id, $matrix);
    exit;
  }
  else if ($cmd == "/png")
  {
    $matrix = getMatrixPNG($msg, $chat_id);
    sendDocument($bot_token, $chat_id, $matrix);
    exit;
  }
  else if ($cmd == "/svg")
  {
    $matrix = getMatrixSVG($msg, $chat_id);
    sendDocument($bot_token, $chat_id, $matrix);
    exit;
  }
} // Получение сообщения
