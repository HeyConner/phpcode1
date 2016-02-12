<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/contact.php";

    session_start();
    if (empty($_SESSION['contact_list'])) {
        $_SESSION['contact_list'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app)
    {
        return $app['twig']->render('contact_list.html.twig', array('contacts' => Contact::getAll()));
    });

    $app->get("/contact_form", function() use ($app)
    {
        return $app['twig']->render('contact_form.html.twig');
    });

    $app->post("/new_contact", function() use ($app)
    {
        $contacts = new Contact($_POST['name'], $_POST['number'], $_POST['address']);
        $contacts->save();
        return $app['twig']->render('new_contact.html.twig', array('new_contact' => $contacts));
    });

    $app->post("/delete_contact", function() use ($app)
    {
        Contact::deleteAll();
        return $app['twig']->render('delete_contact.html.twig');
    });
   //$app->post("/new_contact", function() use ($app)
   //{
     //$contact = new Contact($_POST['name'], $_POST['number'], $_POST['address']);
     //$contact->save();

      //  return $app['twig']->render('new_contact.html.twig',)})
    return $app;
?>
