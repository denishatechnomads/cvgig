<?php

    const APP_VERSION = "2.0.0";
    const API_VERSION = "2.0.0";

    const KNET_CODE = "knet";
    const CREDIT_CODE = "credit";
    const BOOKEEY_CODE = "Bookeey";
    const AMEX_CODE = "amex";

    const KNET_TITLE = "KNET";
    const CREDIT_TITLE = "Credit Card";
    const BOOKEEY_TITLE = "Bookeey PG";
    const AMEX_TITLE = "AMEX";

    const DEFAULT_PAYMENT_OPTION = BOOKEEY_CODE;

    const IS_ENABLE = 1;

    const IS_TEST_MODE_ENABLE = 1;

    const TITLE = "Bookeey Payment";

    const DESCRIPTION = "Pay with Bookeey payment";

    const MERCHANT_ID = "mer1900023";

    const SECRET_KEY = "7422461";

    const SUCCESS_URL = "https://demo.bookeey.com/portal/paymentSuccess";

    const FAILURE_URL = "https://demo.bookeey.com/portal/paymentfailure";

    const TEST_BOOKEEY_PAYMENT_GATEWAY_URL = "https://apps.bookeey.com/pgapi/api/payment/requestLink";


    const LIVE_BOOKEEY_PAYMENT_GATEWAY_URL = "https://pg.bookeey.com/internalapi/api/payment/requestLink";


    const TEST_BOOKEEY_PAYMENT_REQUERY_URL = "https://apps.bookeey.com/pgapi/api/payment/paymentstatus";


    const LIVE_BOOKEEY_PAYMENT_REQUERY_URL = "https://pg.bookeey.com/internalapi/api/payment/paymentstatus";


    const PAYMENT_OPTIONS = array(
        array(
            'is_active' => 1,
            'title' => KNET_TITLE,
            'code' => KNET_CODE
        ),
        array(
            'is_active' => 1,
            'title' => CREDIT_TITLE,
            'code' => CREDIT_CODE
        ),
        array(
            'is_active' => 1,
            'title' => BOOKEEY_TITLE,
            'code' => BOOKEEY_CODE
        ),
        array(
            'is_active' => 1,
            'title' => AMEX_TITLE,
            'code' => AMEX_CODE
        )
    );
