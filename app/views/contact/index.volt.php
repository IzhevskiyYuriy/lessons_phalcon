
<?= $this->getContent() ?>

<div class="page-header">
    <h2>Contact us</h2>
</div>

<p>Отправьте нам сообщение и сообщите нам, как мы можем помочь. Пожалуйста, будьте как можно более наглядными, поскольку это поможет нам лучше обслуживать вас.</p>

<?= $this->tag->form(['contact/send', 'role' => 'form']) ?>
<fieldset>
    <div class="form-group">
        <?= $form->label('name') ?>
        <?= $form->render('name', ['class' => 'form-control']) ?>
    </div>

    <div class="form-group">
        <?= $form->label('email') ?>
        <?= $form->render('email', ['class' => 'form-control']) ?>
    </div>


    <div class="form-group">
        <?= $form->label('comments') ?>
        <?= $form->render('comments', ['class' => 'form-control']) ?>
    </div>

    <div class="form-group">
        <?= $this->tag->submitButton(['Send', 'class' => 'btn btn-primary btn-large']) ?>
    </div>
</fieldset>
</form>