<?php

/**
 * Laika Framework
 * Author: Showket Ahmed
 * Email: riyadhtayf@gmail.com
 * License: MIT
 * This file is part of the Laika Framework.
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Laika\App\Model;

// Deny Direct Access
defined('APP_PATH') || http_response_code(403).die('403 Direct Access Denied!');

use Laika\Model\Model;

class Options extends Model
{

    // Table
    protected string $table = 'options';

    // ID
    public string $id = 'id';

    // Option Key Column Name
    public string $key = 'entity';

    // Option Value Column Name
    public string $value = 'entity_value';

    // Default Option Column Name
    public string $default = 'entity_is_default';

    // Start Code From Here Updated
}
