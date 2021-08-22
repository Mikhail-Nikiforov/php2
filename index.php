<?php
require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

CONST PHOTO = './img/large/';
CONST PHOTO_SMALL = './img/small/';

$nav = array(
    array('name' => 'Главная', 'url' => '/'),

);

$photos = array_slice(scandir(PHOTO_SMALL), 2);


try {
    $loader = new Twig_Loader_Filesystem('templates');

    $twig = new Twig_Environment($loader);

    if (isset($_GET['img'])) {

        $template = $twig->loadTemplate('photo_page.tmpl');

        $content = $template->render(array(
            'nav' => $nav,
            'photo' => $_GET['img'],
            'directory' => PHOTO,
        ));

    } else {

        $template = $twig->loadTemplate('main.tmpl');

        $content = $template->render(array(
            'nav' => $nav,
            'photos' => $photos,
            'directory' => PHOTO_SMALL,
    ));
    }



    echo $content;

} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}