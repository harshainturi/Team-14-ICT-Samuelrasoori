<?php

  function fetchData($url){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_TIMEOUT, 20);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
  }

  $result = fetchData("https://api.instagram.com/v1/users/blackjack.808/media/recent/?access_token=7752520122.fcf30b3.f67193b6bed74f4bac7f57149db2277c&count=14");


  $result = json_decode($result);
  foreach ($result->data as $post) {
     if(empty($post->caption->text)) {
       // Do Nothing
     }
     else {
        echo '<a class="instagram-unit" target="blank" href="'.$post->link.'">
        <img src="'.$post->images->low_resolution->url.'" alt="'.$post->caption->text.'" width="100%" height="auto" />
        <div class="instagram-desc">'.htmlentities($post->caption->text).' | '.htmlentities(date("F j, Y, g:i a", $post->caption->created_time)).'</div></a>';
     }

  }
?>
