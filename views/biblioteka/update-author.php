<?php
/* @var $this yii\web\View */
/* @var $model \app\models\Author */


use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
    <h1>Автор : <?php echo $model->Last_name ; ?> <?php echo $model->First_name; ?></h1>

<?php $form = ActiveForm::begin(); ?>
<?php echo $form->field($model, 'Last_name'); ?>

<?php echo $form->field($model, 'First_name'); ?>

<?php echo $form->field($model, 'Number_of_books'); ?>

<?php echo Html::submitButton('Изменить', [
    'class' => 'btn btn-primary'
]); ?>
<?php ActiveForm::end();