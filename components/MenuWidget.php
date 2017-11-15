<?php
/**
 * Created by PhpStorm.
 * User: UM
 * Date: 04.05.2017
 * Time: 16:47
 */

namespace app\components;

use app\models\Menu;
use yii\base\Widget;;


/**
 * Class MenuWidget
 * @package app\components
 * @var $template string
 * @var $data array
 * @var $tree array
 * @var $menuHtml string
 *
 */
class MenuWidget extends Widget
{
    public $template;
    public $model;
    public $data;
    public $tree;
    public $menuHtml;

    public function init()
    {
        parent::init();
        if($this->template === null || $this->template == "") {
            $this->template = 'menu';
        }
        $this->template .= '.php';
    }

    public function run()
    {

        $this->data = Menu::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree($this->data);
        $this->menuHtml = $this->getMenuHtml($this->tree);

        return $this->menuHtml;
    }

    public function getTree($array)
    {
        $tree = [];
        foreach ($array as $id => &$node) {
            if(!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $array[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = '')
    {
        $str = '';
        foreach ($tree as $item) {
            $str .= $this->itemToTemplate($item, $tab);
        }
        return $str;
    }

    protected  function itemToTemplate($item, $tab)
    {
        ob_start(); // buffer view
        include __DIR__ . '/MenuWidgetTemplate/' .$this->template;
        return ob_get_clean();
    }

}