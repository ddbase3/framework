<?php

namespace Custom\Page;

use Custom\Page\GeneratedPage;

class Index extends GeneratedPage {

	public function getName() {
		return "index";
	}

        public function getUrl() {
                return "./";
        }

}
