<?php

// ====== Отправка сообщения ============
function sendMessage($bot_token, $chat_id, $text, $reply_markup = '')
{
    $ch = curl_init();
    $ch_post = [
        CURLOPT_URL => 'https://api.telegram.org/bot' . $bot_token . '/sendMessage',
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_POSTFIELDS => [
            'chat_id' => $chat_id,
            //'parse_mode' => 'HTML',
            'text' => $text,
            'reply_markup' => $reply_markup,
        ]
    ];

    curl_setopt_array($ch, $ch_post);
    curl_exec($ch);
}
// ====== ****************** ============

// ====== Отправка изображения ============
function sendPhoto($bot_token, $chat_id, $photo, $text = '', $reply_markup = '')
{
    $ch = curl_init();
    $ch_post = [
        CURLOPT_URL => 'https://api.telegram.org/bot' . $bot_token . '/sendPhoto',
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_POSTFIELDS => [
            'chat_id' => $chat_id,
            'photo'     => new CURLFile(realpath($photo)),
            'caption' => $text,
            'reply_markup' => $reply_markup,
        ]
    ];

    curl_setopt_array($ch, $ch_post);
    curl_exec($ch);
}
// ====== ******************** ============

// ====== Отправка изображения ============
function sendDocument($bot_token, $chat_id, $document, $text = '', $reply_markup = '')
{
    $ch = curl_init();
    $ch_post = [
        CURLOPT_URL => 'https://api.telegram.org/bot' . $bot_token . '/sendDocument',
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_POSTFIELDS => [
            'chat_id' => $chat_id,
            'document'     => new CURLFile(realpath($document)),
            'caption' => $text,
            'reply_markup' => $reply_markup,
        ]
    ];

    curl_setopt_array($ch, $ch_post);
    curl_exec($ch);
}
// ====== ******************** ============

// ====== Редактирование сообщений ============
function editMes($bot_token, $chat_id, $message_id, $txt, $reply_markup = '')
{
  if (!empty($reply_markup)) {$reply_markup = json_encode(array('inline_keyboard' => $reply_markup));}
  $url = 'https://api.telegram.org/bot' . $bot_token . '/editMessageText?chat_id=' . $chat_id . '&message_id=' . $message_id . '&text=' . urlencode($txt) . '&reply_markup=' . $reply_markup;
  file_get_contents($url);
}
// ====== ************************ ============

function getMatrixGif ($matrix_text, $chat_id)
{
  $path = "img/$chat_id.gif";
  $url = 'https://ecoprint.spb.ru/barcode/barcode.php?d=' . $matrix_text . '&s=gs1-dmtx&f=gif&wm=1&md=1&ms=s';
  file_put_contents($path, file_get_contents($url));
  return ($path);
}
function getMatrixSVG ($matrix_text, $chat_id)
{
  $path = "img/$chat_id.svg";
  $url = 'https://ecoprint.spb.ru/barcode/barcode.php?d=' . $matrix_text . '&s=gs1-dmtx&f=svg&wm=1&md=1&ms=s';
  file_put_contents($path, file_get_contents($url));
  return ($path);
}
function getMatrixPNG ($matrix_text, $chat_id)
{
  $path = "img/$chat_id.png";
  $url = 'https://ecoprint.spb.ru/barcode/barcode.php?d=' . $matrix_text . '&s=gs1-dmtx&f=png&wm=1&md=1&ms=s';
  file_put_contents($path, file_get_contents($url));
  return ($path);
}
