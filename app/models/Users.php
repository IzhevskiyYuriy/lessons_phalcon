<?php

use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;
use Phalcon\Validation\Validator\Uniqueness as UniquenessValidator;
use Phalcon\Validation\Validator\StringLength as StringLength;

class Users extends Model
{
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new EmailValidator([
                'message' => 'E-mail должен быть валидный'
            ])
        );

        $validator->add(
            'email',
            new UniquenessValidator([
                'message' => 'К сожалению, эта электронная почта была зарегистрирована другим пользователем'
            ])
        );

        $validator->add(
            'username',
            new UniquenessValidator([
                'message' => 'Извините, пользователь с таким именем уже существует'
            ])
        );
        $validator->add(
            'password',
            new StringLength(
                [
                    'messageMinimum' => 'Пароль слишком короткий',
                    "messageMaximum" => 'Пароль слишком длинный',
                    "max"            => 50,
                    "min"            => 8,
                ]
            )
        );

        return $this->validate($validator);




    }

}