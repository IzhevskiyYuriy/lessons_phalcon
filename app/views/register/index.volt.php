<?= $this->getContent() ?>

<div class="page-header ">
    <h2>Register</h2>
</div>

<?= $this->tag->form(['register', 'id' => 'registerForm', 'onbeforesubmit' => 'return false']) ?>
    <fieldset>
        <div class="control-group">
            <?= $form->label('name', ['class' => 'controll-label']) ?>
            <div class="controls">
                <?= $form->render('name', ['class' => 'form-control']) ?>
                <p class="help-block">(required)</p>
                <div class="alert alert-warning" id="name_alert">
                    <strong>Внимание! Заполните поле имени</strong>
                </div>
            </div>
        </div>

        <div class="control-group">
            <?= $form->label('username', ['class' => 'controll-label']) ?>
            <div class="controls">
                <?= $form->render('username', ['class' => 'form-control']) ?>
                <p class="help-block">(required)</p>
                <div class="alert alert-warning" id="username_alert">
                    <strong>Внимание! Введите желаемое имя пользователя</strong>
                </div>
            </div>
        </div>

        <div class="control-group">
            <?= $form->label('email', ['class' => 'controll-label']) ?>
            <div class="controls">
                <?= $form->render('email', ['class' => 'form-control']) ?>
                <p class="help-block">(required)</p>
                <div class="alert alert-warning" id="email_alert">
                    <strong>Внимание! Введите свой E-mail</strong>
                </div>
            </div>
        </div>

        <div class="control-group">
            <?= $form->label('password', ['class' => 'controll-label']) ?>
            <div class="controls">
                <?= $form->render('password', ['class' => 'form-control']) ?>
                <p class="help-block">(minimum 8 characters)</p>
                <div class="alert alert-warning" id="password_alert">
                    <strong>Внимание! Придумайте себе пароль</strong>
                </div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="repeatPassword">Repeat Password</label>
            <div class="controls">
                <?= $this->tag->passwordField(['repeatPassword', 'class' => 'form-control']) ?>
                <div class="alert" id="repeatPassword_alert">
                    <strong>Внимание!</strong> Пароль не соответствует
                </div>
            </div>
        </div>

        <div class="form-actions">
            <?= $this->tag->submitButton(['Users', 'class' => 'btn btn-primary', 'onclick' => 'return SignUp.validate();']) ?>
            <p class="help-block">Зарегистрировавшись, вы принимаете условия использования и политику конфиденциальности.</p>
        </div>


    </fieldset>

</form>