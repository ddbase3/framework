<?php

namespace Custom\Page;

use Page\Moduled\AbstractModuledPage;
use Page\Api\IPageCatchall;

class GeneratedPage extends AbstractModuledPage implements IPageCatchall {

	// Implementation of IBase

	public function getName() {
		return "generatedpage";
	}

	// Implementation of IOutput

	public function getOutput($out = "html") {

		$accesscontrol = $this->servicelocator->get('accesscontrol');
		$language = $this->servicelocator->get('language');

		$pagecfgfile = rtrim(DIR_LOCAL, DIRECTORY_SEPARATOR) . "/Page/page-" . $_REQUEST["name"] . ".json";
		if (!file_exists($pagecfgfile)) {
			header("HTTP/1.0 404 Not Found");
			die("404 Not Found\n");
		}
		$content = file_get_contents($pagecfgfile);
		$pagecfg = json_decode($content, true);

		foreach ($pagecfg["pageheaders"] as $pageheader) {
			$pagemoduleheader = $this->classmap->getInstanceByInterfaceName("Page\\Api\\IPageModuleHeader", $pageheader["name"]);
			if (isset($pageheader["active"]) && !$pageheader["active"]) continue;
			if (isset($pageheader["user"]) && is_array($pageheader["user"])) {
				$userid = $accesscontrol->getUserId();
				if (!in_array($userid, $pageheader["user"])) continue;
			}
			if (isset($pageheader["data"])) $pagemoduleheader->setData($pageheader["data"]);
			$this->addHeader($pagemoduleheader);
		}

		foreach ($pagecfg["pagecontents"] as $pagecontent) {
			$pagemodulecontent = $this->classmap->getInstanceByInterfaceName("Page\\Api\\IPageModuleContent", $pagecontent["name"]);
			if (isset($pagecontent["active"]) && !$pagecontent["active"]) continue;
			if (isset($pagecontent["user"]) && is_array($pagecontent["user"])) {
				$userid = $accesscontrol->getUserId();
				if (!in_array($userid, $pagecontent["user"])) continue;
			}
			if (isset($pagecontent["language"]) && is_array($pagecontent["language"])) {
				$l = $language->getLanguage();
				if (!in_array($l, $pagecontent["language"])) continue;
			}
			if (isset($pagecontent["data"])) $pagemodulecontent->setData($pagecontent["data"]);
			$this->addContent($pagemodulecontent);
		}

		return parent::getOutput($out);
	}

}
