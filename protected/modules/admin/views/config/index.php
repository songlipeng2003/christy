<form action="" method="post">
	<fieldset>
	<legend>网站配置信息</legend>
	<?php
		foreach ($configs as $key => $value) {
			echo '<label>'.$key.'</label>';
			echo '<input type="text" name='.$key.' value='.$value.'>';
			echo '<br/>';
		}
	?>
	<button type="submit" class="btn">修改网站配置</button>
	</fieldset>
</form>