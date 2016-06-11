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

use OCA\Mail\Db\Alias;
use OCP\IRequest;
use OCA\Mail\Service\AliasesService;
use OCP\AppFramework\Controller;
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
	 * @param AliasesService $aliasesService
	 */
	public function __construct($appName, IRequest $request, AliasesService $aliasesService) {
		parent::__construct($appName, $request);
		$this->aliasService = $aliasesService;
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 * @param int $accountId
	 * @return Alias[]
	 */
	public function index($accountId) {
		return $this->aliasService->findAll($accountId);
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
	 * @param int $id
	 * @param string $alias
	 * @return Alias[]
	 */
	public function update($id, $alias) {
		return $this->aliasService->update($id, $alias);
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 * @param int $id
	 * @return Alias[]
	 */
	public function destroy($id) {
		return $this->aliasService->delete($id);
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 * @param int $accountId
	 * @param string $alias
	 * @return Alias[]
	 */
	public function create($accountId, $alias) {
		return $this->aliasService->create($accountId, $alias);
	}
}
