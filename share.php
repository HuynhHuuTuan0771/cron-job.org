<?php
$user = 'Tên URL facebook';
/* == Id chứa fanfage == */
$token = 'Token nick sử dụng';
$accounts = json_decode(cURL('https://graph.facebook.com/me/accounts?access_token=' . $token),true);
$feed = json_decode(cURL('https://graph.facebook.com/' . $user . '/feed?access_token='.$token.'&limit=1'),true);
$accounts['data'] = is_array($accounts['data']) ? $accounts['data'] : array($accounts['data']);
foreach ($accounts['data'] as $data) {
    echo cURL('https://graph.facebook.com/' . $feed['data'][0]['id'] . '/sharedposts?method=post&access_token='.$data['access_token']) . '<br/><br/><br/>';
}
function cURL ($url) {
    $data = curl_init();
    curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($data, CURLOPT_URL, $url);
    $hasil = curl_exec($data);
    curl_close($data);
    return $hasil;
}

?>
