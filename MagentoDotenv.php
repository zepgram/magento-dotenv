<?php
namespace Zepgram\Component\MagentoDotenv;

use Symfony\Component\Dotenv\Dotenv as SymfonyDotenv;

class MagentoDotenv
{
    /** @var string */
    public const SRC_APP_ETC_DOTENV = '/vendor/zepgram/magento-dotenv/dist/app/dotenv.php';

    /** @var string */
    public const DEST_APP_ETC_DOTENV = '/app/dotenv.php';

    /** @var string */
    public const ENV_FILE = '/.env';

    /**
     * Deploy dotenv files and load dotenv
     */
    public static function init()
    {
        $dotenvSrc = ROOT_DIRECTORY . self::SRC_APP_ETC_DOTENV;
        $dotenvDest = ROOT_DIRECTORY . self::DEST_APP_ETC_DOTENV;
        $envFile = ROOT_DIRECTORY . self::ENV_FILE;

        if (!file_exists($dotenvDest)) {
            copy($dotenvSrc, $dotenvDest);
        }
        if (!file_exists($envFile)) {
            touch($envFile);
        }

        require_once $dotenvDest;
    }

    /**
     * @param bool $usePutEnv
     * @param string $envKey
     * @param string $debugKey
     * @return SymfonyDotenv
     */
    public static function get(bool $usePutEnv = false, $envKey = 'APP_ENV', string $debugKey = 'APP_DEBUG')
    {
        $dotenv = new SymfonyDotenv($envKey, $debugKey);
        $dotenv->usePutEnv($usePutEnv);
        $dotenv->loadEnv(ROOT_DIRECTORY . self::ENV_FILE);

        return $dotenv;
    }
}
