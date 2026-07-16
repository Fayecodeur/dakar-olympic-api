<?php

use App\Services\Soap\OlympicSoapService;
use Illuminate\Contracts\Http\Kernel;

ini_set('soap.wsdl_cache_enabled', 0);
ini_set('soap.wsdl_cache_ttl', 0);

if (isset($_GET['wsdl'])) {
    header('Content-Type: text/xml');
    echo file_get_contents(__DIR__ . '/olympic.wsdl');
    exit;
}

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

try {
    $service = new OlympicSoapService();

    $server = new \SoapServer(
        __DIR__ . '/olympic.wsdl',
        [
            'cache_wsdl' => WSDL_CACHE_NONE,
        ]
    );

    $server->setObject($service);
    $server->handle();
} catch (\Throwable $e) {
    http_response_code(500);
    header('Content-Type: text/plain');

    echo 'Erreur serveur SOAP : ' . $e->getMessage();
}
