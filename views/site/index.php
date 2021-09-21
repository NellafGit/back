<?php
/* @var $this yii\web\View */
/* @var $bookList[] app\models\Book */

use yii\helpers\Url;
use yii\grid\GridView;

?>
<h1>Библиотека</h1>
<!---->
<!--<br>-->
<!---->
<!--<br><br>-->
<!--<table class="table ">-->
<!--<tr>-->
<!--    <th></th>-->
<!--    <th>Название</th>-->
<!--    <th>Автор</th>-->
<!--    <th></th>-->
<!--    <th></th>-->
<!--</tr>-->
<!--    --><?php //foreach ($bookList as $author): ?>
<!--<tr>-->
<!--    <td></td>-->
<!--    <td>--><?php //echo $author->Title; ?><!--</td>-->
<!--    <td>--><?php //echo $author->author->Last_name;  ?><!--</td>-->
<!---->
<!---->
<!-- </tr>-->
<!--    --><?php //endforeach;?>
<!-- </table>-->
<?php
    echo GridView::widget([
     'summary' => '<br>',
            'tableOptions' => [
             'class' => 'table'
     ],
    'dataProvider' => $dataProvider,
    'columns' => [
        'Title' ,
        ['attribute' => 'role_id','label' => 'Роль'],
        ],
]);
?>