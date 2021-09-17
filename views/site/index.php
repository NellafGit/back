<?php
/* @var $this yii\web\View */
/* @var $bookList[] app\models\Book */

use yii\helpers\Url;
?>
<h1>Библиотека</h1>

<br>

<br><br>
<table class="table ">
<tr>
    <th></th>
    <th>Название</th>
    <th>Автор</th>
    <th></th>
    <th></th>
</tr>
    <?php foreach ($bookList as $author): ?>
<tr>
    <td></td>
    <td><?php echo $author->Title; ?></td>
    <td><?php echo $author->author->Last_name. " ". $author->author->First_name;  ?></td>


 </tr>
    <?php endforeach;?>
 </table>
