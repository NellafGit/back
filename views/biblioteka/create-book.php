<?php
/* @var $this yii\web\View */
/* @var $model \app\models\Book */
/* @var $model \app\models\Author */


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Author;
use app\models\Book;
?>
    <h1>Добавление книги</h1>

<?php $form = ActiveForm::begin(); ?>

<?php echo $form->field($model, 'Title'); ?>
<?php echo $form->field($svyaz, 'Author_id')->dropDownList(Author::getArray(), ['prompt' => 'Vibor', 'multiple' => 'true']) ?>

<?php //echo $form->field($model, 'Title')->dropDownList(Author::find()->select(['First_name'])->column(),
//['prompt' => 'Выберите Автора']);   ?>


<?php echo Html::submitButton('Add', [
    'class' => 'btn btn-primary'
]); ?>
<?php ActiveForm::end();