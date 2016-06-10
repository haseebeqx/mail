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
use OCA\Mail\Db\Alias;
use OCA\Mail\Db\AliasMapper;

class AliasesService {

	/** @var \OCA\Mail\Db\AliasMapper */
	private $mapper;

	/**
	 * @param AliasMapper $mapper
	 */
	public function __construct(AliasMapper $mapper) {
		$this->mapper = $mapper;
	}

	public function findAll($accountId) {
		return $this->mapper->findAll($accountId);
	}

	public function create($accountId, $alias_name) {
		$alias = new Alias();
		$alias->setAccountId($accountId);
		$alias->setAlias($alias_name);
		return $this->mapper->insert($alias);
	}

	public function delete($id) {
		$alias = $this->mapper->find($id);
		$this->mapper->delete($alias);
		return $alias;
	}

	public function update($id, $alias_name) {
		$alias = $this->mapper->find($id);
		$alias->setAlias($alias_name);
		return $this->mapper->update($alias);
	}
}
