<?php

class RegisterController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Sign Up/Sign In');
        parent::initialize();
    }

    public function indexAction()
    {
        $form = new RegisterForm;

        if ($this->request->isPost()) {

            $name = $this->request->getPost('name', ['string', 'striptags']);
            $username = $this->request->getPost('username', 'alphanum' );
            $email = $this->request->getPost('email', 'email' );
            $password = $this->request->getPost('password');
            $repeatPassword = $this->request->getPost('repeatPassword');

            if ($password != $repeatPassword) {
                $this->flash->error('Пароли не совпадают');
                return false;
            }

            $user = new Users();

            $user->name = $name;
            $user->username = $username;
            $user->email = $email;
            $user->password = sha1($password);
            $user->created_at = new Phalcon\Db\RawValue('now()');
            $user->active = 'Y';

            if ($user->save() == false) {
                foreach ($user->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
            } else {
                $this->tag->setDefault('email', '');//Назначает значения по умолчанию для сгенерированных тегов
                $this->tag->setDefault('password', '');
                $this->flash->success('Спасибо за регистрацию, пожалуйста, войдите в систему, чтобы начать создавать счета-фактуры');

                return $this->dispatcher->forward(
                    [
                        'controller' => 'session',
                        'action' => 'index'
                    ]
                );
            }
        }
        $this->view->form = $form;

    }
}