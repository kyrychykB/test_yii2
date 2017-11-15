<?php
use yii\helpers\Url;

/**
 * Renders menu items
 * @var $item \app\models\Menu
 */

$id = Yii::$app->request->get('id');
$active = ($id == $item['id'] ) ? 'active' : '';
?>
<li>
    <a href="<?=Url::to(['/item/view', 'id' => $item['id']])?>" class="sidebar__item <?=$active?>">
            <?=$item['title']?>
    </a>
    <?php if(isset($item['childs'])): ?>
        <ul class="list sidebar__item__child">
            <?=$this->getMenuHtml($item['childs']); ?>
        </ul>
    <?php endif; ?>
</li>

