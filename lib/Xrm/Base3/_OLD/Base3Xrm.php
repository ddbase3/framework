<?php

namespace Xrm\Base3;

use Api\ICheck;
use Xrm\AbstractXrm;

class Base3Xrm extends AbstractXrm implements ICheck {

	private $database;
	private $usermanager;

	private $xrmname;

	public function __construct($xrmname) {
		parent::__construct();
		$this->database = $this->servicelocator->get('database');
		$this->usermanager = $this->servicelocator->get('usermanager');
		$this->xrmname = $xrmname;
	}

	// Implementation of IXrm

	public function getXrmName() {
		return $this->xrmname;
	}

	public function delEntry($id, $moveonly = false) {
		$entry = $this->getEntry($id);
		if (!$entry || $this->getAccess($entry) != "write") return false;

		$this->database->connect();

		$sql = "SELECT e.`id`, e.`data_id`, t.`dbtable`, t.`primary`
			FROM `base3system_sysentry` e
			INNER JOIN `base3system_systype` t ON t.`id` = e.`type_id`
			WHERE e.`uuid` = 0x" . $id;
		$sysentry = $this->database->singleQuery($sql);
		if ($sysentry == null) return false;

		$sql = "DELETE FROM `" . $sysentry["dbtable"] . "` WHERE `" . $sysentry["primary"] . "` = " . $sysentry["data_id"];
		$this->database->nonQuery($sql);

/*
		$sql = "DELETE FROM `base3system_sysallocdatachar`
			WHERE `id` IN (
				SELECT `id` FROM (
					SELECT `id` FROM `base3system_sysalloc` WHERE `entry_id_1` = " . intval($sysentry["id"]) . " OR `entry_id_2` = " . intval($sysentry["id"]) . "
				) x
			)";
		$this->database->nonQuery($sql);

		$sql = "DELETE FROM `base3system_sysallocdataint`
			WHERE `id` IN (
				SELECT `id` FROM (
					SELECT `id` FROM `base3system_sysalloc` WHERE `entry_id_1` = " . intval($sysentry["id"]) . " OR `entry_id_2` = " . intval($sysentry["id"]) . "
				) x
			)";
		$this->database->nonQuery($sql);

		$sql = "DELETE FROM `base3system_sysalloc` WHERE `entry_id_1` = " . intval($sysentry["id"]) . " OR `entry_id_2` = " . intval($sysentry["id"]);
		$this->database->nonQuery($sql);
*/

		$sql = "DELETE FROM `base3system_sysapp` WHERE `entry_id` = " . intval($sysentry["id"]);
		$this->database->nonQuery($sql);

		$sql = "DELETE FROM `base3system_syscolor` WHERE `entry_id` = " . intval($sysentry["id"]);
		$this->database->nonQuery($sql);

		$sql = "DELETE FROM `base3system_syscomment` WHERE `entry_id` = " . intval($sysentry["id"]);
		$this->database->nonQuery($sql);

		$sql = "DELETE FROM `base3system_sysgroupaccess` WHERE `entry_id` = " . intval($sysentry["id"]);
		$this->database->nonQuery($sql);

		$sql = "DELETE FROM `base3system_syslog` WHERE `entry_id` = " . intval($sysentry["id"]);
		$this->database->nonQuery($sql);

		$sql = "DELETE FROM `base3system_sysmetadata` WHERE `entry_id` = " . intval($sysentry["id"]);
		$this->database->nonQuery($sql);

		$sql = "DELETE FROM `base3system_sysname` WHERE `entry_id` = " . intval($sysentry["id"]);
		$this->database->nonQuery($sql);

		$sql = "DELETE FROM `base3system_sysnews` WHERE `entry_id1` = " . intval($sysentry["id"]) . " OR `entry_id2` = " . intval($sysentry["id"]);
		$this->database->nonQuery($sql);

		$sql = "DELETE FROM `base3system_syspreview` WHERE `entry_id` = " . intval($sysentry["id"]);
		$this->database->nonQuery($sql);

		$sql = "DELETE FROM `base3system_sysrating` WHERE `entry_id` = " . intval($sysentry["id"]);
		$this->database->nonQuery($sql);

		$sql = "DELETE FROM `base3system_sysrelevance` WHERE `entry_id` = " . intval($sysentry["id"]);
		$this->database->nonQuery($sql);

		$sql = "DELETE FROM `base3system_sysreminder` WHERE `entry_id` = " . intval($sysentry["id"]);
		$this->database->nonQuery($sql);

		$sql = "DELETE FROM `base3system_syssearch` WHERE `entry_id` = " . intval($sysentry["id"]);
		$this->database->nonQuery($sql);

		$sql = "DELETE FROM `base3system_systag` WHERE `entry_id` = " . intval($sysentry["id"]);
		$this->database->nonQuery($sql);

		$sql = "DELETE FROM `base3system_sysurgency` WHERE `entry_id` = " . intval($sysentry["id"]);
		$this->database->nonQuery($sql);

		$sql = "DELETE FROM `base3system_sysuseraccess` WHERE `entry_id` = " . intval($sysentry["id"]);
		$this->database->nonQuery($sql);
/*
		$sql = "DELETE FROM `base3system_sysentry` WHERE `id` = " . intval($sysentry["id"]);
		$this->database->nonQuery($sql);
*/
		$sql = "UPDATE `base3system_sysentry` SET `type_id` = 1, `archive` = 0 WHERE `id` = " . intval($sysentry["id"]);
		$this->database->nonQuery($sql);

		return true;
	}

	public function setEntry($entry) {
		if (is_array($entry)) $entry = (object) $entry;
		if ($entry->id != null && substr($entry->id, 0, 2) == "xx") return false;

		$user = (object) $this->usermanager->getUser();
		$userid = $user ? $user->id : "";

		$newEntry = null;
		if ($entry->id == null) {
			$newEntry = new \Xrm\XrmEntry;
			$newEntry->id = $this->uuid();
		} else {
			$newEntry = $this->getEntry($entry->id);
			if (!$newEntry) return null;
			if ($this->getAccess($newEntry) != "write") return null;
		}

		if ($entry->name != null) $newEntry->name = $entry->name;
		if ($entry->type != null) $newEntry->type = $entry->type;
		if ($entry->data != null) $newEntry->data = $entry->data;
		if ($entry->archive != null) $newEntry->archive = $entry->archive ? 1 : 0;

		// TODO alten Eintrag holen und allocs, tags, apps vergleichen. Bei Änderungen auch in den Verbundenen ändern (also ggfs. hinzufügen/löschen)!

		$removeAllocs = array_diff($newEntry->alloc == null ? array() : $newEntry->alloc, $entry->alloc == null ? array() : $entry->alloc);
		$addAllocs = array_diff($entry->alloc == null ? array() : $entry->alloc, $newEntry->alloc == null ? array() : $newEntry->alloc);
		if ($entry->alloc !== null) $newEntry->alloc = $entry->alloc;  // !== wichtig, da empty array == null
		if ($entry->xrmnames != null) $newEntry->xrmnames = $entry->xrmnames;

		$newEntry->access = $entry->access == null ? array() : $entry->access;
		if ($entry->id == null) {
			$access = new \Xrm\XrmEntryAccess;
			$access->mode = "owner";
			$access->usergroup = "user";
			$access->id = $userid;
			$newEntry->access[] = $access;
		}

		if (substr($entry->id, 0, 2) != "xx") {
			$newEntry->log = $entry->log == null ? array() : $entry->log;
			$log = new \Xrm\XrmEntryLog;
			$log->action = $entry->id == null ? "created" : "changed";
			$log->user = $userid;
			$log->timestamp = date("Y-m-d H:i:s");
			$newEntry->log[] = $log;
		}


		// save to db

		$this->database->connect();

		// TODO Update !!!

		// TODO neue Datentypen ggfs. automatisch anlegen
		$sql = "SELECT `id`, `dbtable`, `primary` FROM `base3system_systype` WHERE `alias` = '" . $this->database->escape($newEntry->type) . "'";
		$systype = $this->database->singleQuery($sql);
		if ($systype == null) return false;

		// corresponding data table
		// TODO ggfs überschüssige Daten in sysmetadata speichern (vorher Tabellen-Signatur holen)
		$sql = "INSERT INTO `" . $systype["dbtable"] . "` SET ";
		foreach ($entry->data as $n => $v) $sql .= "`" . $n . "` = '" . $this->database->escape($v) . "', ";
		$sql = substr($sql, 0, -2);
		$this->database->nonQuery($sql);
		$dataid = $this->database->insertId();

		// sysentry
		// TODO nur varbinary(16)-IDs können aktuell gespeichert werden ... PRÜFEN/LÖSEN !!!
		// TODO check if already exists
		$archive = $newEntry->archive ? 1 : 0;
		$sql = "INSERT INTO `base3system_sysentry` SET `uuid` = 0x" . $this->database->escape($newEntry->id) . ", `type_id` = " . $systype["id"] . ", `data_id` = " . $dataid . ", `archive` = " . $archive . ", `connections` = 0";
		$this->database->nonQuery($sql);
		$entryid = $this->database->insertId();

		// sysname
		$sql = "INSERT INTO `base3system_sysname` SET `entry_id` = " . $entryid . ", `lang_id` = 1, `name` = '" . $this->database->escape($newEntry->name) . "'";
		$this->database->nonQuery($sql);

		// sysalloc
		// TODO nur varbinary(16)-IDs können aktuell gespeichert werden ... PRÜFEN/LÖSEN !!!
		foreach ($removeAllocs as $alloc) {
			if (substr($alloc, 0, 2) == "xx") continue;
			$this->removeAlloc($alloc, $newEntry->id);
		}
		foreach ($addAllocs as $alloc) {
			if (substr($alloc, 0, 2) == "xx") continue;
			$sql = "INSERT INTO `base3system_sysalloc` (`entry_id_1`, `entry_id_2`)
				SELECT $entryid, `id`
				FROM `base3system_sysentry`
				WHERE `uuid` = 0x" . $this->database->escape($alloc);
			$this->database->nonQuery($sql);
		}

		// sysapp
		foreach ($removeAllocs as $alloc) {
			if (substr($alloc, 0, 4) != "xxap") continue;
			$app = strtoupper(substr($alloc, 4, 1)) . substr($alloc, 5);
			$sql = "DELETE FROM `base3system_sysapp` WHERE `entry_id` = " . $entryid . " AND `app` = '" . $this->database->escape($app) . "'";
			$this->database->nonQuery($sql);
		}
		foreach ($addAllocs as $alloc) {
			if (substr($alloc, 0, 4) != "xxap") continue;
			$app = strtoupper(substr($alloc, 4, 1)) . substr($alloc, 5);
			$sql = "INSERT INTO `base3system_sysapp` SET `entry_id` = " . $entryid . ", `app` = '" . $this->database->escape($app) . "'";
			$this->database->nonQuery($sql);
		}

		// systag
		foreach ($removeAllocs as $alloc) {
			if (substr($alloc, 0, 4) != "xxta") continue;
			$tag = substr($alloc, 4);
			$sql = "DELETE FROM `base3system_systag` WHERE `entry_id` = " . $entryid . " AND `tag` = '" . $this->database->escape($tag) . "'";
			$this->database->nonQuery($sql);
		}
		foreach ($addAllocs as $alloc) {
			if (substr($alloc, 0, 4) != "xxta") continue;
			$tag = substr($alloc, 4);
			$sql = "INSERT INTO `base3system_systag` SET `entry_id` = " . $entryid . ", `tag` = '" . $this->database->escape($tag) . "'";
			$this->database->nonQuery($sql);
		}

		// syslog
		// TODO ggfs neuen User ohne Passwort anlegen (kann sich schließlich per SSO anmelden)
		foreach ($newEntry->log as $log) {
			$log = (object) $log;
			$action = "";
			if ($log->action == "created") $action = "new";
			if ($log->action == "changed") $action = "change";
			$sql = "INSERT INTO `base3system_syslog` (`entry_id`, `user_id`, `action`, `datetime`)
				SELECT " . $entryid . ", `id`, '" . $action . "', '" . $this->database->escape($log->timestamp) . "'
				FROM `base3system_sysuser`
				WHERE `name` = '" . $this->database->escape($log->user) . "'";
			$this->database->nonQuery($sql);
		}

		// sysuseraccess, sysgroupaccess
		// TODO ggfs neuen User ohne Passwort/neue Gruppe anlegen (kann sich schließlich per SSO anmelden)
		foreach ($newEntry->access as $access) {
			$access = (object) $access;
			$sql = $access->usergroup == "user"
				? "INSERT INTO `base3system_sysuseraccess` (`entry_id`, `user_id`, `mode`)
					SELECT " . $entryid . ", `id`, '" . $this->database->escape($access->mode) . "'
					FROM `base3system_sysuser`
					WHERE `name` = '" . $this->database->escape($access->id) . "'"
				: "INSERT INTO `base3system_sysgroupaccess` (`entry_id`, `group_id`, `mode`)
					SELECT " . $entryid . ", `id`, '" . $this->database->escape($access->mode) . "'
					FROM `base3system_sysgroup`
					WHERE `name` = '" . $this->database->escape($access->id) . "'";
			$this->database->nonQuery($sql);
		}

		$newEntry->xrmnames[] = $this->xrmname;

		return $newEntry;
	}

	public function getEntry($id) {
		if ($this->logging) $this->logger->log("xrm", json_encode(array("host" => $_SERVER['HTTP_HOST'] , "fn" => "getEntry", "id" => $id)));
		$entries = $this->getEntries(array($id));
		if ($this->logging) $this->logger->log("xrm", json_encode(array("host" => $_SERVER['HTTP_HOST'] , "fn" => "getEntry", "num" => sizeof($entries) ? 1 : 0)));
		return sizeof($entries) ? array_pop($entries) : null;
	}

	public function getEntries($ids) {
		if ($this->logging) $this->logger->log("xrm", json_encode(array("host" => $_SERVER['HTTP_HOST'] , "fn" => "getEntries", "ids" => $ids)));

		$entrytypes = array();
		$entryback = array();
		$entryids = array();
		$entries = array();

		$selids = array();
		foreach ($ids as $id) {
			if (substr($id, 0, 2) == "xx") continue;
			$selids[] = $id;
		}

		$this->database->connect();

		$sql = "SELECT e.`id`, LOWER(HEX(e.`uuid`)) AS `uuid`, e.`data_id`, e.`archive`, t.`alias` AS `type`, t.`dbtable`, t.`primary`
			FROM `base3system_sysentry` e
			INNER JOIN `base3system_systype` t ON t.`id` = e.`type_id`
			WHERE e.`type_id` != 1 AND e.`uuid` IN (0x" . implode(", 0x", $selids) . ")";
		$sysentries = $this->database->multiQuery($sql);
		if (!sizeof($sysentries)) {
			if ($this->logging) $this->logger->log("xrm", json_encode(array("host" => $_SERVER['HTTP_HOST'] , "fn" => "getEntries", "num" => 0)));
			return array();
		}

		foreach ($sysentries as $sysentry) {
			if (!isset($entrytypes[$sysentry["type"]])) $entrytypes[$sysentry["type"]] = array("data_ids" => array(), "dbtable" => $sysentry["dbtable"], "primary" => $sysentry["primary"]);
			$entrytypes[$sysentry["type"]]["data_ids"][] = $sysentry["data_id"];

			$entryback[$sysentry["type"]][$sysentry["data_id"]] = $sysentry["id"];

			$entryids[] = $sysentry["id"];

			$entry = new \Xrm\XrmEntry;
			$entry->id = $sysentry["uuid"];
			$entry->type = $sysentry["type"];
			$entry->archive = $sysentry["archive"] ? 1 : 0;
			$entry->alloc = array();
			$entry->access = array();
			$entry->log = array();
			$entries[$sysentry["id"]] = $entry;
		}

		foreach ($entrytypes as $type => $entrytype) {
			$sql = "SELECT * FROM `" . $entrytype["dbtable"] . "` WHERE `" . $entrytype["primary"] . "` IN (" . implode(", ", $entrytype["data_ids"]) . ")";
			$datas = $this->database->multiQuery($sql);
			foreach ($datas as $data) {
				$id = $entryback[$type][$data[$entrytype["primary"]]];
				$entries[$id]->data = $data;
				unset($entry->data[$entrytype["primary"]]);
			}
		}

		// TODO multi lang
		$sql = "SELECT `entry_id` AS `id`, MIN(`name`) AS `name` FROM `base3system_sysname` WHERE `entry_id` IN (" . implode(", ", $entryids) . ") GROUP BY `entry_id`";
		$sysentries = $this->database->multiQuery($sql);
		foreach ($sysentries as $sysentry) $entries[$sysentry["id"]]->name = $sysentry["name"];

		$sql = "SELECT a.`entry_id_1` AS `id`, LOWER(HEX(e.`uuid`)) AS `uuid`
			FROM `base3system_sysalloc` a
			INNER JOIN `base3system_sysentry` e ON a.`entry_id_2` = e.`id`
			WHERE a.`entry_id_1` IN (" . implode(", ", $entryids) . ")
			UNION
			SELECT a.`entry_id_2` AS `id`, LOWER(HEX(e.`uuid`)) AS `uuid`
			FROM `base3system_sysalloc` a
			INNER JOIN `base3system_sysentry` e ON a.`entry_id_1` = e.`id`
			WHERE a.`entry_id_2` IN (" . implode(", ", $entryids) . ")
			UNION
			SELECT t.`entry_id` AS `id`, CONCAT('xxta', LOWER(t.`tag`)) AS `uuid`
			FROM `base3system_systag` t
			WHERE t.`entry_id` IN (" . implode(", ", $entryids) . ")
			UNION
			SELECT a.`entry_id` AS `id`, CONCAT('xxap', LOWER(a.`app`)) AS `uuid`
			FROM `base3system_sysapp` a
			WHERE a.`entry_id` IN (" . implode(", ", $entryids) . ")";
		$sysentries = $this->database->multiQuery($sql);
		foreach ($sysentries as $sysentry) $entries[$sysentry["id"]]->alloc[] = $sysentry["uuid"];
		foreach ($entries as $entryid => $entry) $entries[$entryid]->alloc[] = "xxty" . $entry->type;

		$sql = "SELECT ua.`entry_id` AS `id`, 'user' AS `usergroup`, u.`name` AS `xid`, ua.`mode`
			FROM `base3system_sysuseraccess` ua
			INNER JOIN `base3system_sysuser` u ON ua.`user_id` = u.`id`
			WHERE ua.`entry_id` IN (" . implode(", ", $entryids) . ")
			UNION
			SELECT ga.`entry_id` AS `id`, 'group' AS `usergroup`, g.`name` AS `xid`, ga.`mode`
			FROM `base3system_sysgroupaccess` ga
			INNER JOIN `base3system_sysgroup` g ON ga.`group_id` = g.`id`
			WHERE ga.`entry_id` IN (" . implode(", ", $entryids) . ")";
		$sysentries = $this->database->multiQuery($sql);
		foreach ($sysentries as $sysentry) {
			$access = new \Xrm\XrmEntryAccess;
			$access->mode = $sysentry["mode"];
			$access->usergroup = $sysentry["usergroup"];
			$access->id = $sysentry["xid"];
			$entries[$sysentry["id"]]->access[] = $access;
		}

		$sql = "SELECT l.`entry_id` AS `id`, u.`name`, l.`action`, l.`datetime` AS `timestamp`
			FROM `base3system_syslog` l
			INNER JOIN `base3system_sysuser` u ON l.`user_id` = u.`id`
			WHERE l.`action` != 'read' AND l.`entry_id` IN (" . implode(", ", $entryids) . ")";
		$sysentries = $this->database->multiQuery($sql);
		foreach ($sysentries as $sysentry) {
			$log = new \Xrm\XrmEntryLog;
			$log->action = $sysentry["action"];
			$log->user = $sysentry["name"];
			$log->timestamp = $sysentry["timestamp"];
			$entries[$sysentry["id"]]->log[] = $log;
		}

		foreach ($entries as $id => $entry) {
			$entries[$id]->xrmnames[] = $this->xrmname;
		}

		foreach ($entries as $id => $entry) {
			$access = $this->getAccess($entry);
			if ($access == "none") unset($entries[$id]);
		}

		if ($this->logging) $this->logger->log("xrm", json_encode(array("host" => $_SERVER['HTTP_HOST'] , "fn" => "getEntries", "num" => sizeof($entries))));
		return $entries;
	}

	public function getAllocIds($id) {
		// no access check on allocs, because only ids
		if ($this->logging) $this->logger->log("xrm", json_encode(array("host" => $_SERVER['HTTP_HOST'] , "fn" => "getAllocIds", "id" => $id)));

		$this->database->connect();

		$entries = array();

		if (substr($id, 0, 4) == "xxta") {

			$sql = "SELECT LOWER(HEX(e.`uuid`)) AS `uuid`
				FROM `base3system_systag` t
				INNER JOIN `base3system_sysentry` e ON t.`entry_id` = e.`id`
				WHERE LOWER(t.`tag`) = '" . substr($id, 4) . "'";
			$sysentries = $this->database->multiQuery($sql);
			foreach ($sysentries as $sysentry) $entries[] = $sysentry["uuid"];

		} else if (substr($id, 0, 4) == "xxap") {

			$sql = "SELECT LOWER(HEX(e.`uuid`)) AS `uuid`
				FROM `base3system_sysapp` a
				INNER JOIN `base3system_sysentry` e ON a.`entry_id` = e.`id`
				WHERE LOWER(a.`app`) = '" . substr($id, 4) . "'";
			$sysentries = $this->database->multiQuery($sql);
			foreach ($sysentries as $sysentry) $entries[] = $sysentry["uuid"];

		} else if (substr($id, 0, 4) == "xxty") {

			$sql = "SELECT LOWER(HEX(e.`uuid`)) AS `uuid`
				FROM `base3system_systype` t
				INNER JOIN `base3system_sysentry` e ON t.`id` = e.`type_id`
				WHERE t.`alias` = '" . substr($id, 4) . "'";
			$sysentries = $this->database->multiQuery($sql);
			foreach ($sysentries as $sysentry) $entries[] = $sysentry["uuid"];

		} else {

			$sql = "SELECT e.`id`, t.`alias` as `type`
				FROM `base3system_sysentry` e
				INNER JOIN `base3system_systype` t ON e.`type_id` = t.`id`
				WHERE e.`uuid` = 0x" . $id;
			$entry = $this->database->singleQuery($sql);
			if ($entry == null) {
				if ($this->logging) $this->logger->log("xrm", json_encode(array("host" => $_SERVER['HTTP_HOST'] , "fn" => "getAllocIds", "num" => 0)));
				return array();
			}
			$entryid = $entry["id"];

			$entries[] = "xxty" . $entry["type"];

			$sql = "SELECT LOWER(HEX(e.`uuid`)) AS `uuid`
				FROM `base3system_sysalloc` a
				INNER JOIN `base3system_sysentry` e ON a.`entry_id_2` = e.`id`
				WHERE a.`entry_id_1` = " . $entryid . "
				UNION
				SELECT LOWER(HEX(e.`uuid`)) AS `uuid`
				FROM `base3system_sysalloc` a
				INNER JOIN `base3system_sysentry` e ON a.`entry_id_1` = e.`id`
				WHERE a.`entry_id_2` = " . $entryid . "
				UNION
				SELECT CONCAT('xxap', LOWER(a.`app`)) AS `uuid`
				FROM `base3system_sysapp` a
				WHERE a.`entry_id` = " . $entryid . "
				UNION
				SELECT CONCAT('xxta', LOWER(t.`tag`)) AS `uuid`
				FROM `base3system_systag` t
				WHERE t.`entry_id` = " . $entryid;
			$sysentries = $this->database->multiQuery($sql);
			foreach ($sysentries as $sysentry) $entries[] = $sysentry["uuid"];

		}

		if ($this->logging) $this->logger->log("xrm", json_encode(array("host" => $_SERVER['HTTP_HOST'] , "fn" => "getAllocIds", "num" => sizeof($entries), "entries" => $entries)));
		return $entries;
	}

	public function getAllEntryIds() {
		// no access check on allocs, because only ids
		if ($this->logging) $this->logger->log("xrm", json_encode(array("host" => $_SERVER['HTTP_HOST'] , "fn" => "getAllEntryIds")));

		$entries = array();

		$this->database->connect();

		$sql = "SELECT LOWER(HEX(`uuid`)) AS `uuid` FROM `base3system_sysentry` WHERE `type_id` != 1";
		$sysentries = $this->database->multiQuery($sql);
		foreach ($sysentries as $sysentry) $entries[] = $sysentry["uuid"];

		if ($this->logging) $this->logger->log("xrm", json_encode(array("host" => $_SERVER['HTTP_HOST'] , "fn" => "getAllEntryIds", "num" => sizeof($entries))));
		return $entries;
	}

	public function getXrmEntryIds($xrmname, $invert = false) {
		// no access check on allocs, because only ids
		if ((!$invert && $xrmname != $this->xrmname) || ($invert && $xrmname == $this->xrmname)) return array();
		if ($this->logging) $this->logger->log("xrm", json_encode(array("host" => $_SERVER['HTTP_HOST'] , "fn" => "getXrmEntryIds", "xrmname" => $xrmname)));
		$entries = $this->getAllEntryIds();
		if ($this->logging) $this->logger->log("xrm", json_encode(array("host" => $_SERVER['HTTP_HOST'] , "fn" => "getXrmEntryIds", "num" => sizeof($entries))));
		return $entries;
	}

	public function addTag($id, $tag) {
		$entry = $this->getEntry($id);
		if (!$entry || $this->getAccess($entry) != "write") return false;

		$this->database->connect();

		$sql = "SELECT `id` FROM `base3system_sysentry` WHERE `type_id` != 1 AND `uuid` = 0x" . $id;
		$entryid = $this->database->scalarQuery($sql);
		if ($entryid == null) return true;

		$sql = "INSERT INTO `base3system_systag` SET `entry_id` = " . $entryid . ", `tag` = '" . $this->database->escape($tag) . "'";
		$this->database->nonQuery($sql);
		return true;
	}

	public function removeTag($id, $tag) {
		$entry = $this->getEntry($id);
		if (!$entry || $this->getAccess($entry) != "write") return false;

		$this->database->connect();

		$sql = "SELECT `id` FROM `base3system_sysentry` WHERE `type_id` != 1 AND `uuid` = 0x" . $id;
		$entryid = $this->database->scalarQuery($sql);
		if ($entryid == null) return true;

		$sql = "DELETE FROM `base3system_systag` WHERE `entry_id` = " . $entryid . " AND `tag` = '" . $this->database->escape($tag) . "'";
		$this->database->nonQuery($sql);
		return true;
	}

	public function addApp($id, $app) {
		$entry = $this->getEntry($id);
		if (!$entry || $this->getAccess($entry) != "write") return false;

		$this->database->connect();

		$sql = "SELECT `id` FROM `base3system_sysentry` WHERE `type_id` != 1 AND `uuid` = 0x" . $id;
		$entryid = $this->database->scalarQuery($sql);
		if ($entryid == null) return true;

		$sql = "INSERT INTO `base3system_sysapp` SET `entry_id` = " . $entryid . ", `app` = '" . $this->database->escape($app) . "'";
		$this->database->nonQuery($sql);
		return true;
	}

	public function removeApp($id, $app) {
		$entry = $this->getEntry($id);
		if (!$entry || $this->getAccess($entry) != "write") return false;

		$this->database->connect();

		$sql = "SELECT `id` FROM `base3system_sysentry` WHERE `type_id` != 1 AND `uuid` = 0x" . $id;
		$entryid = $this->database->scalarQuery($sql);
		if ($entryid == null) return true;

		$sql = "DELETE FROM `base3system_sysapp` WHERE `entry_id` = " . $entryid . " AND `app` = '" . $this->database->escape($app) . "'";
		$this->database->nonQuery($sql);
		return true;
	}

	public function addAlloc($id1, $id2) {
		// only check access for id1, id2 is possible not reachable from this xrm

		$entry = $this->getEntry($id1);
		if (!$entry || $this->getAccess($entry) != "write") return false;

		$this->database->connect();

		$sql = "SELECT `id` FROM `base3system_sysentry` WHERE `uuid` = 0x" . $id1;
		$entryid1 = $this->database->scalarQuery($sql);
		if ($entryid1 == null) return true;

		$sql = "SELECT `id` FROM `base3system_sysentry` WHERE `uuid` = 0x" . $id2;
		$entryid2 = $this->database->scalarQuery($sql);
		if ($entryid2 == null) {
			$sql = "INSERT INTO `base3system_sysentry` SET `uuid` = 0x" . $id2 . ", `type_id` = 1, `data_id` = 0";
			$this->database->nonQuery($sql);
			$entryid2 = $this->database->insertId();
		}

		// only create one alloc
		if ($id2 < $id1) {
			$tmp = $entryid1;
			$entryid1 = $entryid2;
			$entryid2 = $tmp;
		}

		$sql = "INSERT INTO `base3system_sysalloc` SET `entry_id_1` = " . $entryid1 . ", `entry_id_2` = " . $entryid2;
		$this->database->nonQuery($sql);

		return true;
	}

	public function removeAlloc($id1, $id2) {
		// only check access for id1, id2 is possible not reachable from this xrm

		$entry = $this->getEntry($id1);
		if (!$entry || $this->getAccess($entry) != "write") return false;

		$this->database->connect();

		$sql = "SELECT `id` FROM `base3system_sysentry` WHERE `uuid` = 0x" . $id1;
		$entryid1 = $this->database->scalarQuery($sql);
		if ($entryid1 == null) return true;

		$sql = "SELECT `id` FROM `base3system_sysentry` WHERE `uuid` = 0x" . $id2;
		$entryid2 = $this->database->scalarQuery($sql);
		if ($entryid2 == null) return true;

		$sql = "DELETE FROM `base3system_sysalloc` WHERE (`entry_id_1` = " . $entryid1 . " AND `entry_id_2` = " . $entryid2 . ") OR (`entry_id_2` = " . $entryid1 . " AND `entry_id_1` = " . $entryid2 . ")";
		$this->database->nonQuery($sql);

		$sql = "SELECT COUNT(`id`) AS `cnt` FROM `base3system_sysalloc` WHERE `entry_id_1` = " . $entryid2 . " OR `entry_id_2` = " . $entryid2;
		$cnt = $this->database->scalarQuery($sql);
		$sql = "DELETE FROM `base3system_sysentry` WHERE `id` = " . $entryid2 . " AND `type_id` = 1";
		$this->database->nonQuery($sql);

		return true;
	}

	// Implementation of ICheck

	public function checkDependencies() {
		return array(
			"depending_services" => $this->database == null ? "Fail" : "Ok"
		);
	}

}
