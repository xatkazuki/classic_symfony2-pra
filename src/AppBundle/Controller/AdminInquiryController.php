<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AdminInquiryController extends Controller
{
    /**
     * @Route("/admin/inquiry")
     */
    public function adminInquiryListAction()
    {
        /**
         * @Route("/")
         */
        $entitymanager = $this -> getDoctrine()->getManager();

        $adminInquiryRepository = $entitymanager->getRepository('AppBundle:Inquiry');

        $adminInquiryList = $adminInquiryRepository->findBy([],['id'=>'DESC']);

        return $this->render('Admin/Inquiry/index.html.twig',['adminInquiryList'=>$adminInquiryList]);

    }

}
