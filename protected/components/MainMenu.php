<?php
class MainMenu extends CWidget	{
	public function run()	{
		$this->widget('bootstrap.widgets.TbNavbar',array(
			'items'=>array(
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'items'=>array(
						array('label'=>'home', 'url'=>array('/site/index')),
						array('label'=>'portfolio', 'url'=>array('/site/portfolio')),
						array('label'=>'skills', 'url'=>array('/site/skills')),
						array('label'=>'resume', 'url'=>array('/site/resume')),
						array('label'=>'contact', 'url'=>array('/site/contact')),
					),
				)
			)
		));
	}
}
?>