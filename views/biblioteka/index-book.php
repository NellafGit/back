<?php
/* @var $this yii\web\View */
/* @var $bookList[] app\models\Book */

use yii\helpers\Url;
?>
    <h1>Библиотека</h1>

    <br>


    <table class="table ">
        <tr>
            <th></th>
            <th>Название</th>
            <th>Автор</th>
            <th></th>
            <th><a href="<?php echo Url::to(['biblioteka/create-book']); ?>" class="btn btn-primary"> Добавить книгу </a></th>
        </tr>
        <?php foreach ($bookList as $books): ?>
            <tr>
                <td></td>
                <td><?php echo $books->Title; ?></td>
                <td><?php foreach ($books->authors as $author) {
                    echo $author->First_name . ' ' . $author->Last_name;
                    }?></td>

                <td><a href="<?php echo Url::to(['biblioteka/update-book', 'id' => $books->id]); ?>">Изменить</a> </td>
                <td><a href="<?php echo Url::to(['biblioteka/delete-book', 'id' => $books->id]); ?>">Удалить</a> </td>
            </tr>
        <?php endforeach;?>
    </table>
<?php
