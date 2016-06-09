<?php
/**
 * @author Tahaa Karim <tahaalibra@gmail.com>
 *
 * ownCloud - Mail
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace OCA\Mail\Service;

use Exception;
use OCA\Mail\Account;
use OCA\Mail\Db\AliasMapper;
use OCP\IL10N;

class AliasesService {

	/** @var \OCA\Mail\Db\AliasMapper */
	private $mapper;

	/**
	 * @param AliasMapper $mapper
	 */
	public function __construct(AliasMapper $mapper) {
		$this->mapper = $mapper;
	}

	/**
	 * @param $currentUserId
	 * @param $accountId
	 */
	public function findAll($currentUserId, $accountId) {
		// fetch all aliases
	}

	/**
	 * @param $currentUserId
	 * @param $accountId
	 */
	public function delete($currentUserId, $accountId) {
		// delete an alias
	}

	/**
	 * @param $newAlias
	 * @return \OCA\Mail\Db\Alias
	 */
	public function save($newAlias) {
		// new alias
	}
}
