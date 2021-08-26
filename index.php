<?php
require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
    $db_connect = new PDO('mysql:dbname=php2;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    echo "Error: Could not connect. " . $e->getMessage();
}

if (isset($db_connect)) {
    $db_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

try {

    if(!isset($_GET['limit'])) {
        $limit = 25;
    } else {
        $limit = $_GET['limit'];
    }

    $sql = "SELECT goods.id AS id, goods.nameFull AS name, goods.miniPhoto AS src, goods.bigPhoto AS srcBig, goods.param AS description, goods.price AS price FROM goods limit $limit";
    if (!empty($db_connect)) {
        $sth = $db_connect->query($sql);
        while ($row = $sth->fetchObject()) {
            $data[] = $row;
        }
    }

    print_r($_GET['a']);

    unset($db_connect);


    $loader = new Twig_Loader_Filesystem('templates');
    $twig = new Twig_Environment($loader);
    $template = $twig->loadTemplate('main.tmpl');

    $content = $template->render(array (
        'data' => $data,
        'count'=>count($data)
    ));

    echo $content;

} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}