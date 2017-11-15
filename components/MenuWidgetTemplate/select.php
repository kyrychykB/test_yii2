
<?
/**
 * Renders select options
 * @var $item \app\models\Menu
 * @var $tab string
 */
?>
<option
        value="<?=$item['id']?>"
        <?
            if($item['id'] == $this->model->parent_id) echo 'selected';
            if($item['id'] == $this->model->id) echo 'disabled';
        ?>
    >
            <?=$tab . $item['title']?>
</option>
<?php if(isset($item['childs'])): ?>
    <?=$this->getMenuHtml($item['childs'], $tab . '	&nbsp-&nbsp'); ?>
<?php endif; ?>