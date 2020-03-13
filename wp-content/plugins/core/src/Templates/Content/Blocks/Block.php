<?php

namespace Tribe\Project\Templates\Content\Blocks;

use Tribe\Project\Twig\Twig_Template;

abstract class Block extends Twig_Template {

	protected $attributes;

	public function __construct( $template, Environment $twig = null, $attributes = [] ) {
		parent::__construct( $template, $twig );

		$this->attributes = $attributes;
	}

}
