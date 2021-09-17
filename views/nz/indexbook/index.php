<?php
/* @var $this yii\web\View */
/* @var $bookList[] app\models\Book */

use yii\helpers\Url;
?>
    <h1>Библиотека</h1>

    <br>

    <a href="<?php echo Url::to(['biblioteka/create-book']); ?>" class="btn btn-primary"> Добавить книгу </a>
    <a href="<?php echo Url::to(['biblioteka/create-author']); ?>" class="btn btn-primary"> Добавить Автора </a>

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

                <td><a href="<?php echo Url::to(['biblioteka/update-book', 'id' => $author->id]); ?>">Изменить</a> </td>
                <td><a href="<?php echo Url::to(['biblioteka/delete-book', 'id' => $author->id]); ?>">Удалить</a> </td>
            </tr>
        <?php endforeach;?>
    </table>
<?php
