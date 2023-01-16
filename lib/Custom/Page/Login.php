<?php

namespace Custom\Page;

use Custom\Page\GeneratedPage;

class Login extends GeneratedPage {

	public function getName() {
		return "login";
	}

        public function getUrl() {
                return "login.php";
        }

}
