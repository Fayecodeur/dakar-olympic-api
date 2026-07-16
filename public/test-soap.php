<?php
// Client de test du service SOAP
$client = new \SoapClient(
    'http://127.0.0.1:8000/soap.php?wsdl',
    [
        'cache_wsdl' => WSDL_CACHE_NONE,
        'trace' => true,
        'exceptions' => true,
    ]
);

try {
    $result = $client->getAthleteById(1);
    echo "<pre>";
    print_r($result);
    echo "</pre>";
} catch (\SoapFault $e) {
    echo "SOAP Fault : " . $e->getMessage() . "\n\n";
    echo "--- Réponse ---\n";
    echo $client->__getLastResponse() . "\n";
}
