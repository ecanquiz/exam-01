<?php
declare(strict_types=1);

class MyClass {
    private DateTime $targetDate;

    public function __construct(string $targetDate) {
        $this->targetDate = DateTime::createFromFormat('d-m-Y H:i:s', $targetDate);
    }

    public function getTimeLeft(): array {
        $now = new DateTime();
        $diff = $this->targetDate->diff($now);
    
        $years = $diff->y;
        $months = $diff->m;
        $weeks = floor($diff->d / 7);
        $days = $diff->d % 7;
        $minutes = $diff->i;
        $seconds = $diff->s;    

        return [
            //'years' => $years,
            'months' => $months + ($years * 12),
            'weeks' => $weeks,
            'days' => $days,
            'minutes' => $minutes,
            'seconds' => $seconds
        ];
    }
  
    public function getDummyApiResults(): array{
        $apiKey = 'YOUR_API_KEY_HERE'; // Replace with your API key
        //$url = 'https://dummyapi.io/data/v1/post';
        $url = 'https://jsonplaceholder.typicode.com/posts/1';
        //$headers = ['app-id' => $apiKey];
        $headers = [];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        curl_close($ch);

        $results = json_decode($response, true); //['data'];
        return $results;
    }
}

// Example usage:
$objOfMyClass = new MyClass('30-11-2025 14:30:00');

echo '<pre>';
print_r($objOfMyClass->getTimeLeft());
print_r($objOfMyClass->getDummyApiResults());
echo '</pre>';
