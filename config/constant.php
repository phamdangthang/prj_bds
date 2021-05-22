<?php
    if (!defined('PAGE_LIMIT')) {
        define('PAGE_LIMIT', '10');
    }    

    if (!defined('PROJECT')) {
        define('PROJECT', 0);
    }

    if (!defined('NEWS')) {
        define('NEWS', 1);
    }

    if (!defined('NEW_TO_USE')) {
        define('NEW_TO_USE', '0');
    }

    if (!defined('USED_ONE_YEAR')) {
        define('USED_ONE_YEAR', '1');
    }

    if (!defined('USED_TWO_YEAR')) {
        define('USED_TWO_YEAR', '2');
    }

    if (!defined('USED_THREE_YEAR')) {
        define('USED_THREE_YEAR', '3');
    }

    if (!defined('EAST')) {
        define('EAST', '0');
    }

    if (!defined('WEST')) {
        define('WEST', '1');
    }

    if (!defined('SOUTH')) {
        define('SOUTH', '2');
    }

    if (!defined('NORTH')) {
        define('NORTH', '3');
    }

    if (!defined('SOUTHEAST')) {
        define('SOUTHEAST', '4');
    }

    if (!defined('NORTHEAST')) {
        define('NORTHEAST', '5');
    }

    if (!defined('SOUTHWEST')) {
        define('SOUTHWEST', '6');
    }

    // chờ duyệt
    if (!defined('PENDING')) {
        define('PENDING', 'pending');
    }

    // đã duyệt
    if (!defined('APPROVED')) {
        define('APPROVED', 'approved');
    }

    // đặt hàng thành công
    if (!defined('ORDER')) {
        define('ORDER', 'order');
    }

    // hoàn thành
    if (!defined('COMPLETE')) {
        define('COMPLETE', 'complete');
    }

    // đã hủy
    if (!defined('CANCEL')) {
        define('CANCEL', 'cancel');
    }

    const DIRECT = [
        EAST => 'Đông',
        WEST => 'Tây',
        SOUTH => 'Nam',
        NORTH => 'Bắc',
        SOUTHEAST => 'Đông Nam',
        NORTHEAST => 'Đông Bắc',
        SOUTHWEST => 'Tây Nam',
    ];