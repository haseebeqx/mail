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
use PhpParser\Node\Stmt\TraitUseAdaptation\Alias;

class AliasMapper extends Mapper {

	/**
	 * @param IDb $db
	 */
	public function __construct(IDb $db) {
		parent::__construct($db, 'mail_aliases');
	}

	/*
	 *  TODO: Add function for CRUD by user id and email
	 */

	/**
	 * Saves an Alias into the database
	 * @param Alias $alias
	 * @return Alias
	 */
	public function save(Alias $alias) {
		if (is_null($alias->getId())) {
			return $this->insert($alias);
		} else {
			$this->update($alias);
			return $alias;
		}
	}

}
