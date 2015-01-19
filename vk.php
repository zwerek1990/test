$home_uri = "http://gorodsad21.dsk-suor.ru/test1";
    $client_id = CLIENT_ID;
    $client_secret = CLIENT_SECRET;
?>
<a href="https://oauth.vk.com/authorize?client_id=<?=$client_id;?>&redirect_uri=<?=$home_uri;?>&scope=notify,friends,groups,offline&response_type=code">Login</a>
<?php
    if (!empty($_GET["code"])) {
        $code = $_GET["code"];
        $query = file_get_contents("https://api.vk.com/oauth/access_token?client_id={$client_id}&client_secret={$client_secret}&code={$code}&redirect_uri={$home_uri}");
                                    
        $res = json_decode($query, 1);
        $token = $res["access_token"];
        echo "<h1>ur token is:</h1>".$token;
        //getting groups;
        $query = file_get_contents("https://api.vk.com/method/groups.get?user_id=".$res["user_id"]."&extended=1&access_token={$token}");
        echo "<pre>";
        print_r(json_decode($query, 1));
        echo "</pre>";
    }
