<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Contact;
use AppBundle\Form\Type\ContactType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig'
        );
    }

    /**
     * @Route("/symfony/heroku", name="symfony_heroku")
     */
    public function symfonyHerokuAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/symfony_heroku.html.twig'
        );
    }

      /**
     * @Route("/symfony/command", name="symfony_command")
     */
    public function symfonyAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/symfony_command.html.twig'
        );
    }

      /**
     * @Route("/symfony/user-bundle", name="symfony_userbundle")
     */
    public function symfonyUserAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/symfony_userbundle.html.twig'
        );
    }

      /**
     * @Route("/post/mind", name="post_mind")
     */
    public function postMindAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/post_mind.html.twig'
        );
    }

       /**
     * @Route("/post/distincion", name="post_distincion")
     */
    public function postDistincionAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/post_distincion.html.twig'
        );
    }

      /**
     * @Route("/post/astar", name="post_astar")
     */
    public function postAStarAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/post_astar.html.twig'
        );
    }

    /**
     * @Route("/acerca", name="about")
     */
    public function aboutAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/about.html.twig'
        );
    }

   



    /**
     * @Route("/contact",name ="contact")
     * @Template("default/contact.html.twig")
     */
    public function enviarCorreoAction(Request $request)
    {
        $entity = new Contact();
        $form = $this->createCreateFormAction($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $varNombre = $form->get('name')->getData();
            $varCorreo = $form->get('email')->getData();
            $varAsunto = $form->get('subject')->getData();
            $varMensaje = $form->get('message')->getData();

            $message = \Swift_Message::newInstance()

              ->setFrom([$varCorreo => $varNombre])
              ->setTo('soporte@newtonlabs.com.gt')
              ->setSubject($varAsunto)
              ->setBody(
                $this->renderView(
                    // app/Resources/views/Emails/registration.html.twig
                    'default/contactEmail.html.twig',
                    ['contenido' => $varMensaje, 'nombre' => $varNombre, 'correo' => $varCorreo]
                ),
                'text/html'
            )

            ;

            $this->get('mailer')->send($message);

            return $this->redirect(
                $this->generateUrl(
                    'homepage'
                )
            );
        }

        return [
            'form' => $form->createView(),
        ];
    }

     /**
     * @return [type] [description]
     */
    public function createCreateFormAction(Contact $entity)
    {
        $form = $this->createForm(new ContactType(), $entity, [
            'action' => $this->generateUrl('contact'),

        ]);

        return $form;
    }
}
