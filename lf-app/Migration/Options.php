<?php

declare(strict_types=1);

// Namespace
namespace Laika\App\Migration;

// Deny Direct Access
defined('APP_PATH') || http_response_code(403).die('403 Direct Access Denied!');

use Laika\Model\Blueprint;
use Laika\Model\Schema;

class Options
{
    /**
     * Migrate Table
     * @param string $table Table Name
     */
    public function migrate(string $table)
    {
        Schema::table($table)->create(function (Blueprint $e) {
            $e->column('id')->int()->auto();
            $e->column('entity')->varchar()->unique();
            $e->column('entity_value')->varchar()->length(500);
            $e->column('entity_is_default')->enum(['yes', 'no'])->default('no');
        })->execute();
    }
}

