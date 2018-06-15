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
		if (isset($this->params['item'])) trigger_error('Variable $item overwritten in foreach on line 12');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockTitle($_args)
	{
?>Úvodní stránka
<?php
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<!-- Page Content -->
<div>
    <div id="custom-div">
        <img class="img-responsive" id="home-assistant" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 8 */ ?>/images/default-social.png" alt="img-home-assistant">
    </div>
    <div class="container">
        <div class="row" id="uvodnik">
<?php
		$iterations = 0;
		foreach ($news as $item) {
?>
                <div class="col-md-4">
                    <h2><?php echo LR\Filters::escapeHtmlText($item->category) /* line 14 */ ?></h2>
                    <figure><img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 15 */ ?>/images/<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($item->category)) /* line 15 */ ?>.jpg" class="img img-responsive img-rounded" alt="<?php
			echo LR\Filters::escapeHtmlAttr($item->category) /* line 15 */ ?>"></figure>                    
                    <h3><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("News:view", [$item->id])) ?>"><?php
			echo LR\Filters::escapeHtmlText($item->title) /* line 16 */ ?></a></h3>
                    <p class="small"><i class="fa fa-calendar-o" aria-hidden="true"></i>
                        <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("News:category", [$item->category])) ?>"><?php
			echo LR\Filters::escapeHtmlText($item->category) /* line 18 */ ?></a> | <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $item->created_at, 'd.m.Y')) /* line 18 */ ?></p>
                    <p><?php echo call_user_func($this->filters->truncate, $item->content, 200) /* line 19 */ ?></p>
                    <a class="btn btn-default" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("News:view", [$item->id])) ?>">Čti dále</a>
                </div>
<?php
			$iterations++;
		}
?>
        </div>
    </div>
</div>
<?php
	}

}
