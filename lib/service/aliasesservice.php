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
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;

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
	 * @param $e
	 * @throws NotFoundException
	 */
	private function handleException ($e) {
		if ($e instanceof DoesNotExistException ||
			$e instanceof MultipleObjectsReturnedException) {
			throw new NotFoundException($e->getMessage());
		} else {
			throw $e;
		}
	}

	/**
	 * @param int $accountId
	 * @return String Alias
	 */
	public function findAll($accountId) {
		return $this->mapper->findAll($accountId);
	}

	/**
	 * @param int $accountId
	 * @param String $alias_name
	 * @return Alias[]
	 */
	public function create($accountId, $alias_name) {
		try {
			$alias = new Alias();
			$alias->setAccountId($accountId);
			$alias->setAlias($alias_name);
			return $this->mapper->insert($alias);
		} catch(Exception $e){
			$this->handleException($e);
		}
	}

	/**
	 * @param int $id
	 * @return \OCA\Mail\Db\Alias[]
	 */
	public function delete($id) {
		try {
			$alias = $this->mapper->find($id);
			$this->mapper->delete($alias);
			return $alias;
		} catch(Exception $e) {
			$this->handleException($e);
		}
	}

	/**
	 * @param int $id
	 * @param string $alias_name
	 * @return Alias[]
	 */
	public function update($id, $alias_name) {
		try {
			$alias = $this->mapper->find($id);
			$alias->setAlias($alias_name);
			return $this->mapper->update($alias);
		} catch(Exception $e) {
			$this->handleException($e);
		}

	}
}
