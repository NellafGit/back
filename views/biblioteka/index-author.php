<?php
/* @var $this yii\web\View */
/* @var $authorList[] app\models\Author */

use yii\helpers\Url;
?>
    <h1>Библиотека</h1>

    <br>


    <table class="table ">
        <tr>
            <th></th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Кол-во книг</th>
            <th></th>
            <th><a href="<?php echo Url::to(['biblioteka/create-author']); ?>" class="btn btn-primary"> Добавить Автора </a></th>
        </tr>
        <?php foreach ($authorList as $author): ?>
            <tr>
                <td></td>
                <td><?php echo $author->Last_name; ?></td>
                <td><?php echo $author->First_name;  ?></td>
                <td><?php echo $author->Number_of_books;  ?></td>
                <td><a href="<?php echo Url::to(['biblioteka/update-author', 'id' => $author->id]); ?>">Изменить</a> </td>
                <td><a href="<?php echo Url::to(['biblioteka/delete-author', 'id' => $author->id]); ?>">Удалить</a> </td>
            </tr>
        <?php endforeach;?>
    </table>
    <br>

<?php
