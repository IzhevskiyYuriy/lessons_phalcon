<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;

class RegisterForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        //Name
        $name = new Text('name');
        $name->setLabel('Your Full Name');
        $name->setFilters(['striptags', 'string']);
        $name->addValidators([
            new PresenceOf([
                'message' => 'Имя не должно быть пустым'
            ])
        ]);
        $this->add($name);

        //Username
        $username = new Text('username');
        $username->setLabel('Username');
        $username->setFilters(['alpha']);
        $username->addValidators([
            new PresenceOf([
                'message' => 'Введите желаемое имя пользователя'
            ])
        ]);
        $this->add($username);

        //Email
        $email = new Text('email');
        $email->setLabel('E-mail');
        $email->setFilters('email');
        $email->addValidators([
            new PresenceOf([
                'message' => 'Поле \'E-mail\' не должно быть пустым'
            ]),
            new Email([
                'message' => 'Email не валидный'
            ])
        ]);
        $this->add($email);

        //Password
        $password = new Password('password');
        $password->setLabel('Password');
        $password->addValidators([
            new PresenceOf([
                'message' => 'Пароль не должен быть пустым'
            ])
        ]);
        $this->add($password);

        // Confirm Password
        $repeatPassword = new Password('repeatPassword');
        $repeatPassword->setLabel('Repeat Password');
        $repeatPassword->addValidators([
            new PresenceOf([
                'message' => 'Требуется пароль подтверждения'
            ])
        ]);
        $this->add($repeatPassword);
    }
}