<?php
use Phalcon\Filter;
class ContactController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Contact us');
        parent::initialize();
    }

    public function indexAction()
    {
        $this->view->form = new ContactForm;
    }

    public function sendAction()
    {
        if($this->request->isPost() != true) {
            // перенаправляем на другое действие
            return $this->dispatcher->forward(
                [
                    'controller' => 'contact',
                    'action' => 'index',
                ]
            );
        }

        $form = new ContactForm();
        $contactModel = new Contact();

        // Validate the form
        $data = $this->request->getPost();

        if (!$form->isValid($data, $contactModel)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    'controller' => 'contact',
                    'action' => 'index',
                ]
            );
        }

        if ($contactModel->save() == false) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                [
                    'controller' => 'contact',
                    'action' => 'index',
                ]
            );
        }

        $this->flash->success('Спасибо, мы свяжемся с вами в ближайшие несколько часов');
            return $this->dispatcher->forward(
                [
                    'controller' => 'index',
                    'action' => 'index',
                ]);



    }

}