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
	 * Cache accounts for multiple calls to 'findByUserId'
	 *
	 * @var IAccount[]
	 */
	private $aliases;

	/** @var IL10N */
	private $l10n;

	/**
	 * @param AliasMapper $mapper
	 */
	public function __construct(AliasMapper $mapper, IL10N $l10n) {
		$this->mapper = $mapper;
		$this->l10n = $l10n;
	}

	/**
	 * @param $currentUserId
	 * @param $accountId
	 * @return IAccount
	 */
	public function findAll($currentUserId, $accountId) {
		if ($this->accounts !== null) {
			foreach ($this->accounts as $account) {
				if ($account->getId() === $accountId) {
					return $account;
				}
			}
			throw new Exception("Invalid account id <$accountId>");
		}

		if ((int)$accountId === UnifiedAccount::ID) {
			return $this->buildUnifiedAccount($currentUserId);
		}
		return new Account($this->mapper->find($currentUserId, $accountId));
	}

	/**
	 * @param int $accountId
	 */
	public function delete($currentUserId, $accountId) {
		if ((int)$accountId === UnifiedAccount::ID) {
			return;
		}
		$mailAccount = $this->mapper->find($currentUserId, $accountId);
		$this->mapper->delete($mailAccount);
	}

	/**
	 * @param $newAccount
	 * @return \OCA\Mail\Db\MailAccount
	 */
	public function save($newAccount) {
		return $this->mapper->save($newAlias);
	}
}
