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

namespace OCA\Mail\Controller;

use OCP\IRequest;
use OCA\Mail\Service\AliasesService;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Http;

class AliasesController extends Controller {

	/** @var AliasesService */
	private $aliasService;

	/**
	 * @var string
	 */
	private $currentUserId;

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param AliasesService $AliasService
	 * @param $UserId
	 */
	public function __construct($appName, IRequest $request, AliasesService $aliasesService, $UserId) {
		parent::__construct($appName, $request);
		$this->aliasService = $aliasesService;
		$this->currentUserId = $UserId;
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 * @param int $accountId
	 */
	public function index($accountId) {
		// return all aliases
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function show() {
		$response = new JSONResponse();
		$response->setStatus(Http::STATUS_NOT_IMPLEMENTED);
		return $response;
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 * @param int $accountId
	 */
	public function update() {
		//update an alias
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 * @param int $accountId
	 */
	public function destroy() {
		// remove aliases
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 * @param int $accountId
	 */
	public function create($accountId) {
		// create an alias
		
	}
}
