<?php
/* @var $this yii\web\View */
/* @var $model \app\models\Book */


use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
    <h1>Добавление книги</h1>

<?php $form = ActiveForm::begin(); ?>

<?php echo $form->field($model, 'Title'); ?>

<?php echo $form->field($model, 'Author'); ?>


<?php echo Html::submitButton('Add', [
    'class' => 'btn btn-primary'
]); ?>
<?php ActiveForm::end();