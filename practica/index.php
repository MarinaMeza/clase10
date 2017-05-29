<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
include '../clases/cd.php';
include '../clases/AccesoDatos.php';


$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});//cada uno de estos se hace por cada metodo que vamos a publicar y genera la interfaz para que se pueda comunicar con alguien mas
$app->get('/', function (Request $request, Response $response) {//este segundo get se muestra al cargar la pagina en lugar del page not found
    $response->getBody()->write("Hola mundo slim framework get");

    return $response;
});
$app->post('/', function (Request $request, Response $response) {
    $response->getBody()->write("Hola mundo slim framework post");

    return $response;
});

$app->get('/cd/', function (Request $request, Response $response) {
    $arrayCd = cd::TraerTodoLosCds();
    //  var_dump($arrayCd);
    //$response->getBody()->write(json_encode($arrayCD));
    $newResponse = $oldResponse->withJson($arrayCd);

    return $response;
});

$app->run();