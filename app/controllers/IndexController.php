<?php

class IndexController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Добро пожаловать');
        parent::initialize();
    }
    public function indexAction()
    {
        if (!$this->request->isPost()) {
            $this->flash->notice('Это пример приложения Phalcon Framework.
                Пожалуйста, не предоставляйте нам личную информацию. Спасибо');
        }

    }
}