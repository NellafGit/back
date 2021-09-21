<?php
/* @var $this yii\web\View */
/* @var $model \app\models\Author */


use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
    <h1>Добавление Автора</h1>

<?php $form = ActiveForm::begin(); ?>

<?php echo $form->field($model, 'Last_name'); ?>
<?php echo $form->field($model, 'First_name'); ?>



<?php echo Html::submitButton('Add', [
    'class' => 'btn btn-primary'
]); ?>
<?php ActiveForm::end();