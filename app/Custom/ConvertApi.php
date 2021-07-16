<?php

namespace App\Custom;

class ConvertApi extends \ConvertApi\ConvertApi {
	// @var string HTTP connection timeout.
    public static $connectTimeout = 120;

    // @var string HTTP read timeout.
    public static $readTimeout = 360;

    // @var string Conversion timeout.
    public static $conversionTimeout = 2000;

    // @var string Conversion timeout delta.
    public static $conversionTimeoutDelta = 240;

    // @var string File upload timeout.
    public static $uploadTimeout = 3000;

    // @var string File download timeout.
    public static $downloadTimeout = 3000;
}