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

use OCP\AppFramework\Db\Entity;

/**
 * @method null setUserId(string $userId)
 * @method string getUserId()
 * @method null setEmail(string $email)
 * @method string getEmail()
 * @method null setAlias(string $alias)
 * @method string getAlias()
 */
class Alias extends Entity {

	protected $userId;
	protected $email;
	protected $alias;

}
