<?php

use Tribe\Project\Templates\Content\Blocks\Hero;

// @todo @sam remove this once you have a handle on the attributes you can use in the twig file.
print_r( $attributes ); 

$template = new Hero( 'content/blocks/hero.twig', null, $attributes );
echo $template->render();