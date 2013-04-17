<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
$this->module->id,
);
?>
<p>
	<a href="<?php echo $this->module->id; ?>/add" class="btn btn-primary">添加书籍</a>
</p>
<table class="table">
    <tr>
        <td>ID</td>
        <td>书名</td>
        <td>作者</td>
        <td>分类</td>
        <td>出版社</td>
        <td>ISBN</td>
        <td>备注</td>
        <td>创建时间</td>
        <td>更新时间</td>
        <td>操作</td>
    </tr>
</table>

<!--
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<p>
This is the view content for action "<?php echo $this->action->id; ?>".
The action belongs to the controller "<?php echo get_class($this); ?>"
in the "<?php echo $this->module->id; ?>" module.
</p>
<p>
You may customize this page by editing <tt><?php echo __FILE__; ?></tt>
</p>
-->