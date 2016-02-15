<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
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

		echo $this->Html->css('e3rundb');		
		echo $this->Html->css('cupertino/jquery-ui-1.11.1.min.css');
		echo $this->Html->css('bootstrap.min.css');
		
		echo $this->Html->script('jquery-1.10.2'); // Include JQuery library
		echo $this->Html->script('jquery-ui-1.11.1.min'); // Include JQuery UI library

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    <?php echo $this->Html->scriptBlock('var jsVars = '.$this->Js->object($jsVars).';'); ?>
</head>
<body>
	<div id="container">
		<div id="header">
		   <h1>Extreme Energy Events Run Database</h1>
			<?php
				echo $this->Html->getCrumbs(' > ', array(
					//'text' => $this->Html->image('home.png'),
					'text' => 'Home',
					'url' => array('plugin' => null,'controller' => 'telescopes', 'action' => 'viewMap'),
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
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
	<?php echo $this->Js->writeBuffer(); // Write cached scripts ?>
</body>
</html>
