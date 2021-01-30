<?php

namespace App\Utils;

class AppConstant
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    const STATUS_FAIL = 'fail';
    const STATUS_OK = 'ok';

    // API status codes
    const OK = 200;

    const BASE_URL = 'http://localhost:8000';
    const ADMIN_URL = '/admin/';
    const ADMIN_GUARD = 'admin';

    const TYPES = [1 => 'Live Webinar', 2 => 'On-Demand Webinar', 3 => 'Pre-Recorded Webinar'];

    const ORDER_CONFORM = 'order_confirm';
    const CONTACT_US = 'contact_us';
    const REGISTRATION = 'registration';
    const SUBSCRIBE = 'subscribe';
    const FORGOT_PASSWORD = 'forgot_password';
}
