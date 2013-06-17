<div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">分类</li>
              <?php $categories=CHtml::listData(Category::model()->findAll(), 'id' , 'name');
                foreach ($categories as $key => $value) {
                  echo '<li><a href="#">'.$value.'</a></li>';
                }
             ?>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->

        <div class="span9">
          
          <div class="row-fluid">
            <div class="span4">
              <?php $books=Book::model()->findAll();
                foreach ($books as $key => $value) {
                  echo '<h2>'.$value->name.'</h2>';
                  echo '<p><a href="#"> <img src="upload/'.$value->picture.'" class="img-rounded"> </a> </p>';
                }
             ?>

            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

<p>You may change the content of this page by modifying the following two files:</p>

<ul>
    <li>View file: <code><?php echo __FILE__; ?></code></li>
    <li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
    the <a href="http://www.yiiframework.com/doc/">documentation</a>.
    Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
    should you have any questions.</p>
