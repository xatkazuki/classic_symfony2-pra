<?php
/**
 * Created by PhpStorm.
 * User: xearts
 * Date: 2018/06/25
 * Time: 14:40
 */
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function latestListAction()
    {
//        $blogList = [
//
//            [
//                "targetDate" => '2018/05/23',
//                "title" => '東京公演のレポート',
//            ],
//            [
//                "targetDate" => '2018/05/30',
//                "title" => '最近の練習風景',
//            ],
//            [
//                "targetDate" => '2018/06/05',
//                "title" => '新しい施設',
//            ],
//
//        ];


        $entitymanager =$this->getDoctrine()->getManager();

        $blogArticleRepository = $entitymanager->getRepository('AppBundle:BlogArticle');

        $blogList = $blogArticleRepository->findBy([],['targetDate' => 'DESC']);

        return $this -> render('Blog/latestList.html.twig',
            ['blogList'=> $blogList]
            );

    }


}