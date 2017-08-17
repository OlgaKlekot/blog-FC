<div class="addPage">
    <form action="<?= \app\core\createUrl('new_article') ?>" id="artToAdd" method="post"  class="addForm">
        <input class="field" placeholder="title" name="title" required>
        <textarea class="field" name="text" id="" cols="70" rows="25" required></textarea>
        <input type="submit" name="adding" class="button" value="Send" form="artToAdd">
    </form>
</div>