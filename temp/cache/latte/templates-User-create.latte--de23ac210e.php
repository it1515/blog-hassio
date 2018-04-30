<?php
// source: D:\www\novinky\app\presenters/templates/User/create.latte

use Latte\Runtime as LR;

class Templatede23ac210e extends Latte\Runtime\Template
{
	public $blocks = [
		'add_head' => 'blockAdd_head',
		'content' => 'blockContent',
		'add_scripts' => 'blockAdd_scripts',
	];

	public $blockTypes = [
		'add_head' => 'html',
		'content' => 'html',
		'add_scripts' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('add_head', get_defined_vars());
?>

<?php
		$this->renderBlock('content', get_defined_vars());
?>

<?php
		$this->renderBlock('add_scripts', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockAdd_head($_args)
	{
		
	}


	function blockContent($_args)
	{
		extract($_args);
		/* line 6 */ $_tmp = $this->global->uiControl->getComponent("userForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
		
	}


	function blockAdd_scripts($_args)
	{
		
	}

}
