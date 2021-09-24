<?php
/* @var $this yii\web\View */
/* @var $model \app\models\Book */


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Author;
?>
    <h1>Книга : <?php echo $model->Title; ?></h1>

<?php $form = ActiveForm::begin(); ?>
<?php echo $form->field($model, 'Title'); ?>
<?php echo $form->field($svyaz, 'Author_id')->dropDownList(Author::getArray(), ['prompt' => 'Vibor', 'multiple' => 'true', 'options' => $model->getArraySelectedAuthors()]) ?>
<?php ?>

<?php echo Html::submitButton('Изменить', [
    'class' => 'btn btn-primary'
]); ?>
<?php ActiveForm::end();