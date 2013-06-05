<?php
// src/Blogger/BlogBundle/Controller/PageController.php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blogger\BlogBundle\AbstractEntity\Enquiry;
use Blogger\BlogBundle\Form\EnquiryType;

/**
 * Class PageController 
 * 
 * @author Juan Vivas <juanlvo@gmail.com>
 */
class PageController extends Controller
{
    /**
     * Action index
     * 
     * @return object render of the view
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()
                   ->getManager();

        $blogs = $em->getRepository('BloggerBlogBundle:Blog')
                    ->getLatestBlogs();

        return $this->render('BloggerBlogBundle:Page:index.html.twig', array(
            'blogs' => $blogs
        ));
    }
    
    /**
     * Action about
     * 
     * @return object render of the view
     */
    public function aboutAction() {
        return $this->render('BloggerBlogBundle:Page:about.html.twig');
    }  
    
    /**
     * Action contact
     * 
     * @return object render of the view
     */
    public function contactAction() {
        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $enquiry);
        
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {

    //            $message = \Swift_Message::newInstance()
    //                ->setSubject('Contact enquiry from symblog')
    //                ->setFrom('enquiries@symblog.co.uk')
    //                ->setTo('email@email.com')
    //                ->setBody($this->renderView('BloggerBlogBundle:Page:contactEmail.txt.twig', array('enquiry' => $enquiry)));
    //            $this->get('mailer')->send($message);

                $this->get('session')->setFlash('blogger-notice', 'Your contact enquiry was successfully sent. Thank you!');

                // Redirige - Esto es importante para prevenir que el usuario
                // reenvíe el formulario si actualiza la página
                return $this->redirect($this->generateUrl('BloggerBlogBundle_contact'));
            }        
        }

        return $this->render('BloggerBlogBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }    
}