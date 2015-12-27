<?php
namespace PCurlThread;
/**
 * RollingCurl custom exception
 */
class RollingCurlException extends Exception {}
/**
 * Class that holds a rolling queue of curl requests.
 *
 * @throws RollingCurlException
 */