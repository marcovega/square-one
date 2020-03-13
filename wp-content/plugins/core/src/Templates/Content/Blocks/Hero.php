<?php

namespace Tribe\Project\Templates\Content\Blocks;

class Hero extends Block {

	public function get_data(): array {
		$data = $this->attributes;

		return $data;
	}

}