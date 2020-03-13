<?php
declare( strict_types=1 );

namespace Tribe\Project\Blocks;

use Tribe\Gutenpanels\Blocks\Block_Type_Interface;

class Hero extends Block_Type_Config {
	public const NAME = 'tribe/hero';

	public function build(): Block_Type_Interface {
		return $this->factory->block( self::NAME )
			->set_label( 'Hero' )
			->set_dashicon( 'welcome-view-site' )
			->add_layout_property( 'grid-template-areas', 'image content cta' )
			->add_sidebar_section(
				$this->factory->sidebar()->section()->set_label( 'Layout Settings' )
					->add_field(
						$this->factory->sidebar()->field()->image_select( 'alignment' )
							->set_label( 'Layout' )
							->add_option( 'Left', 'image-left', 'https://via.placeholder.com/100x60.png?text=Left' )
							->add_option( 'Right', 'image-right', 'https://via.placeholder.com/100x60.png?text=Right' )
							->set_default( 'image-left' )
							->build()
					)
					->add_field(
						$this->factory->sidebar()->field()->radio( 'text_color' )
							->set_label( 'Text Color' )
							->add_option( 'Light', 'light' )
							->add_option( 'Dark', 'dark' )
							->set_default( 'light' )
							->build()
					)
					->build()
			)
			->add_content_section( // Image
				$this->factory->content()->section()
					->set_layout_property( 'grid-area', 'image' )
					->add_field(
						$this->factory->content()->field()->image( 'image' )
							->set_label( 'Image' )
							->build()
					)
					->build()
			)
			->add_content_section(
				$this->factory->content()->section()
					->set_layout_property( 'grid-area', 'content' )
					->add_field(
						$this->factory->content()->field()->text( 'title' )
							->set_label( 'Title' )
							->build()
					)
					->add_field(
						$this->factory->content()->field()->richtext( 'subtitle' )
							->set_label( 'Subtitle' )
							->build()
					)
					->build()
			)
			->add_content_section(
				$this->factory->content()->section()
					->set_layout_property( 'grid-area', 'cta' )
					->add_field(
						$this->factory->content()->field()->link( 'cta' )
							->set_label( 'CTA' )
							->build()
					)
					->build()
			)
			->set_render_strategy_to_template( __DIR__ . '/../../assets/blocks/hero.php' )
			->build();
	}
}
