    
<?php
     /**
     *Gère l'API de OpenWeather
     *
     * @author Brou Fabien <fabienbrou99@gmail.com>/Gravitkar
     */
    
    class OpenWeather{
        
        private $apiKey;

        public function __construct(string $apiKey)
        {
            $this->apiKey = $apiKey;
        }        
        /**
         * Récupère les informations météorologique chaque 3h sur 5jours
         *
         * @param  string $city ville (ex: "Abidjan")
         * @return array
         */
        public function getForecast(string $city): array
        {
            $curl = curl_init("http://api.openweathermap.org/data/2.5/forecast?q={$city}&appid={$this->apiKey}&units=metric&lang=fr");
            curl_setopt_array($curl, [
                     CURLOPT_RETURNTRANSFER => true,
                     CURLOPT_TIMEOUT => 1
                ]);
            $data = curl_exec($curl);
            if ($data === false || curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200) 
            {
                return null;
            } 
                $results = [];
                $data =json_decode($data, true);
                foreach ($data['list'] as $_3hour) {
                    $results[]=[
                        'temperature' => $_3hour['main']['temp'],
                        'description' => $_3hour['weather'][0]['description'],
                        'date' => (new DateTime('@' . $_3hour['dt']))->format('d/m/Y -- H:i')
                    ];
                }
                return $results;
            
        }

    }
?>