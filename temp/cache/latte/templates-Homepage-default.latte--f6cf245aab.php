<?php
// source: D:\www\blog-hassio\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Templatef6cf245aab extends Latte\Runtime\Template
{
	public $blocks = [
		'title' => 'blockTitle',
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'title' => 'html',
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('title', get_defined_vars());
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockTitle($_args)
	{
?>Úvodní stránka
<?php
	}


	function blockContent($_args)
	{
?><!-- Page Content -->
<div class="container">
    

    
</div>
<?php
	}

}
