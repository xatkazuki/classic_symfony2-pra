<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Item;
use Symfony\Component\Form\FormInterface;


/**
 * @Route("/admin/item")
 */

class ItemRegistController extends Controller
{
    /**
     * @Route("/")
     *
     */

    public function adminItemRegistAction(Request $request){



        $form=$this->createFormBuilder()
            ->add('name', 'text')
            ->add('note', 'textarea', ['required'=>false,])
            ->add('discription_detail', 'textarea', ['required'=>false,])
            ->add('free_area', 'textarea', ['required'=>false,])
            ->add('del_flg', 'text', ['required'=>false,])
            ->add('create_date','hidden')
            ->add('update_date','hidden')
            ->add('submit', 'submit', ['label'=>'送信',])

            ->getForm();

        $tody_time= date("Y/m/d");


        $form->handleRequest($request);

        if($form->isValid())
        {



            $message="登録完了";
            $data = $form->getData();

            $item = new Item();
            $item -> setName($data['name']);
            $item -> setNote($data['note']);
            $item -> setDiscriptionDetail($data['discription_detail']);
            $item -> setFreeArea($data['free_area']);
            $item -> setDelFlg($data['del_flg']);
            $item -> setCreateDate($data['create_date']);
            $item -> setUpdateDate($data['update_date']);

            $em =$this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();



            return $this->redirect(
                $this->generateUrl('app_adminmenu_index')
            );
        }

        return $this ->render('Admin/Item/index.html.twig',
            ['form'=>$form->createView(),
                'today_time'=>$tody_time]
            );

    }


}
