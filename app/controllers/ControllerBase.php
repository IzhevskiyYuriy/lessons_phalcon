<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    protected function initialize()
    {
        /**
         * https://docs.phalconphp.com/ru/3.3/tag
         * Динамическое изменение названия документа
         * в наследуемом контроллере   public function initialize()
         *      $this->tag->setTitle('Welcome');
                  parent::initialize();
         */
        $this->tag->prependTitle( 'TEST | ');

        /**
         * https://docs.phalconphp.com/ru/3.3/views
         *Использование шаблонов
         * тобразить после макета
         */
        $this->view->setTemplateAfter('main');

    }
}