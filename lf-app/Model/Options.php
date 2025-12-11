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

use Laika\Model\Blueprint;
use Laika\Core\App\Model;
use Laika\Model\Schema;

class Options Extends Model
{
    // Table
    public string $table = 'options';

    // ID
    public string $id = 'id';

    // Option Key Column Name
    public string $name = 'option_name';

    // Option Value Column Name
    public string $value = 'option_value';

    // Default Option Column Name
    public string $default = 'default_option';

    /**
     * Make Table if Doesn't Exists
     * @return void
     */
    public function migrate()
    {
        // Make Table
        Schema::create($this->table, function (Blueprint $e) {
            $e->id($this->id)
                ->string($this->name, 255)
                ->text($this->value, true)
                ->enum($this->default, ['yes', 'no'], 'no')
                ->index($this->name, 255);
        });

        // Return
        return;
    }
}
