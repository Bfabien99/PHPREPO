<?php
    define("LINK", "https://api.jikan.moe/v3/");
    class AnimeFinder{
        
        public function anime(string $name): ?array
        {   
            
            $curl = curl_init(LINK."search/anime?q={$name}");
            curl_setopt_array($curl, [
                     CURLOPT_RETURNTRANSFER => true,
                     CURLOPT_TIMEOUT => 1
                ]);
            $animes = curl_exec($curl);
            if ($animes === false || curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200) 
            {
                return null;
            } 
                $results = [];
                $animes =json_decode($animes, true);
                foreach ($animes['results'] as $anime) {
                    $results[]=[
                       "id" =>$anime['mal_id'],
                       "url" =>$anime['url'],
                       "imageUrl" =>$anime['image_url'],
                       "title" =>$anime['title'],
                    ];
                }
                return $results;
            
        }

        public function lienExterne(string $id)
        {
            $curl = curl_init(LINK."/anime/$id/episodes");
            curl_setopt_array($curl, [
                     CURLOPT_RETURNTRANSFER => true,
                     CURLOPT_TIMEOUT => 1
                ]);
            $liens = curl_exec($curl);
            if ($liens === false || curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200) 
            {
                return null;
            } 
                $results = [];
                $liens =json_decode($liens, true);
                foreach ($liens['results'] as $lien) {
                    $results[]=[
                       "id" =>$lien['mal_id'],
                       "url" =>$lien['url'],
                       "imageUrl" =>$lien['image_url'],
                       "title" =>$lien['title'],
                    ];
                }
                return $results;
        }

    }
?>