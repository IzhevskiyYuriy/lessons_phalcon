<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;

class ContactForm extends Form
{
    public function initialize($entity = null, $oprions = null)
    {
        //Name
        $name = new Text('name');
        $name->setLabel('Ваше полное имя');
        $name->setFilters(['striptags', 'string']);
        $name->addValidators([
            new PresenceOf([
                'message' => 'Поле \'имя \' не должно быть пустым ',
            ])
        ]);

        $this->add($name);

        //Email
        $email = new Text('email');
        $email->setLabel('E-Mail');
        $email->setFilters('E-Mail');
        $email->addValidators([
            new PresenceOf([
                'message' => 'Поле \'email \' не должно быть пустым',
            ]),
            new Email([
                'message' => 'Поле \'email \' не валидно'
            ])
        ]);
        $this->add($email);

        $comments = new TextArea('comments');
        $comments->setLabel('Comments');
        $comments->setFilters(['striptags', 'string']);
        $comments->addValidators([
            new PresenceOf([
                'message' => 'Поле \'email \' не должно быть пустым',
            ])
        ]);
        $this->add($comments);
    }

}