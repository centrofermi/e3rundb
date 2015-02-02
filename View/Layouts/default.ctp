<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('e3rundb');
		
		echo $this->Html->css('cupertino/jquery-ui-1.11.1.min.css');
		
		echo $this->Html->script('jquery-1.10.2'); // Include JQuery library
		echo $this->Html->script('jquery-ui-1.11.1.min'); // Include JQuery UI library

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
		   <h1>Extreme Energy Events Run Database</h1>
			<?php
				echo $this->Html->getCrumbs(' > ', array(
					//'text' => $this->Html->image('home.png'),
					'text' => 'Home',
					'url' => array('plugin' => null,'controller' => 'runs', 'action' => 'index'),
					'escape' => false));
			?>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	
	<?php echo $this->element('sql_dump'); ?>
	<?php echo $this->Js->writeBuffer(); // Write cached scripts ?>
	
</body>
</html>
