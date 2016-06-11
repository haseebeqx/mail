<?php

/**
 * ownCloud - Mail
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Tahaa Karim <tahaalibra@gmail.com>
 * @copyright Tahaa Karim 2016
 */

namespace OCA\Mail\Db;

use OCP\AppFramework\Db\Mapper;
use OCP\IDb;

class AliasMapper extends Mapper {

	/**
	 * @param IDb $db
	 */
	public function __construct(IDb $db) {
		parent::__construct($db, 'mail_aliases');
	}

	/**
	 * @param int $id
	 * @return Alias[]
	 */
	public function find($id) {
		$sql = 'SELECT * FROM ' . $this->getTableName() . ' WHERE id = ?';
		return $this->findEntity($sql, [$id]);
	}

	/**
	 * @param int $accountId
	 * @return Alias
	 */
	public function findAll($accountId) {
		$sql = 'SELECT * FROM ' . $this->getTableName() . ' WHERE account_id = ?';
		return $this->findEntities($sql, [$accountId]);
	}
}
