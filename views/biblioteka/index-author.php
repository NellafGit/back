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
            <th>Книги</th>
            <th></th>
            <th><a href="<?php echo Url::to(['biblioteka/create-author']); ?>" class="btn btn-primary"> Добавить Автора </a></th>
        </tr>
        <?php foreach ($authorList as $authors): ?>
            <tr>
                <td></td>
                <td><?php echo $authors->Last_name; ?></td>
                <td><?php echo $authors->First_name;  ?></td>
                <td><?php foreach ($authors->books as $book){

                    echo  $book->Title . '<br>';
                    } ?></td>
                <td><a href="<?php echo Url::to(['biblioteka/update-author', 'id' => $authors->id]); ?>">Изменить</a> </td>
                <td><a href="<?php echo Url::to(['biblioteka/delete-author', 'id' => $authors->id]); ?>">Удалить</a> </td>
            </tr>
        <?php endforeach;?>
    </table>
    <br>

<?php
