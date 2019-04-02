<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Inquiry;

/**
 * @Route("/inquiry")
 */

class InquiryController extends Controller
{

    private function createInquiryForm() /*formを定義*/
    {
        return $this -> createFormBuilder(new Inquiry())
            ->add('name', 'text')
            ->add('email', 'text')
            ->add('tel', 'text', ['required' => false,])
            -> add('type','choice',['choices'=>['公演について', 'その他',], 'expanded' =>true])
            ->add('content', 'textarea')

            ->add('submit', 'submit', ['label' => '送信',])
            ->getForm();
    }

    /**
     * @Route("/")
     * @Method("get")
     */

    public function indexAction()
    {

        return $this->render('Inquiry/index.html.twig',['form' => $this->createInquiryForm()->createView()]);
    }

    /**
     * @Route("/")
     * @Method("post")
     */
    public function indexPostAction(Request $request)
    {
        $form =$this->createInquiryForm();/**定義したformを取得*/
        $form->handleRequest($request);/**フォームオブジェクトへ(送信された)情報を取り込む・・後で利用するために事前準備*/

        if($form ->isValid())
        {

            /******** formの処理とエンティティインスタンスへの取り込みを分けたやり方 *******/
 //           $data = $form->getData();
            /**
             * (取り込んだ情報を)フォームオブジェクトから配列で取得して、使いやすいように準備
             * $data['name']...といった形で、データを取り出し利用できる
             */


            /**
             * 先に作成したEntity/Inquiry.phpをインスタンス化し、情報を格納していく。
             * setメソッドは事前にEntity/Inquiry.phpで定義しているから使うことができる。
             * （テーブルの作成とgetメソッド、setメソッドはセットで覚える）
             * */

            /**インスタンス生成、情報格納*/
//            $inquiry = new Inquiry();
//            $inquiry ->setName($data['name']);
//            $inquiry ->setEmail($data['email']);
//            $inquiry ->setTel($data['tel']);
//            $inquiry ->setType($data['type']);
//            $inquiry ->setContent($data['content']);

            /******** formの入力情報を直接エンティティインスタンスに取り込むやり方 *******/

            $inquiry = $form->getData();

            /**エンティティマネジャーを介して*/
            $entitymanager =$this->getDoctrine()->getManager();

            /**Doctrineの管理配下へ*/
            $entitymanager->persist($inquiry);

            /**変更部分を認識させて、データベース処理を識別・実行させる*/
            $entitymanager->flush();

            $message =\Swift_Message::newInstance()
                ->setSubject('Webサイトからのお問合せ')
                ->setFrom('webmaster@example.com')
                ->setTo('devpersnlkzktk@gmail.com')
                ->setBody(
                    $this->renderView(
                        'mail/inquiry.txt.twig',
                        ['data'=>$inquiry]

                    /******** formの処理とデータベース処理を分けたやり方 *******/
                        //['data'=>$data]
                        /** data.name...といった形で、データを取り出し利用できる*/

                    )
                );

            $this->get('mailer')->send($message);

            return $this->redirect($this->generateUrl('app_inquiry_complete'));
        }

        return $this->render('Inquiry/index.html.twig',['form' => $form->createView()]);
    }

    /**
     * @Route("/complete")
     *
     */

    public function completeAction()
    {
        return $this->render('Inquiry/complete.html.twig');
    }
}