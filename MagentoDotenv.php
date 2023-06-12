<?php

declare(strict_types=1);

namespace Zepgram\Component\MagentoDotenv;

use Symfony\Component\Dotenv\Dotenv as SymfonyDotenv;

class MagentoDotenv
{
    /** @var string */
    public const MAGENTO_BOOTSTRAP_FILE = 'app/bootstrap.php';

    /** @var string */
    public const SRC_APP_ETC_DOTENV_FILE = 'vendor/zepgram/magento-dotenv/dist/app/dotenv.php';

    /** @var string */
    public const DEST_APP_ETC_DOTENV_FILE = 'app/dotenv.php';

    /** @var string */
    public const ENV_FILE = '.env';

    /** @var string */
    public const ENV_KEY = 'APP_ENV';

    /** @var string */
    public const DEBUG_KEY = 'APP_DEBUG';

    /**
     * Deploy dotenv files and load dotenv
     */
    public static function init(): void
    {
        $dotenvDest = ROOT_DIRECTORY . self::DEST_APP_ETC_DOTENV_FILE;
        if (\is_file($dotenvDest)) {
            require_once $dotenvDest;
            return;
        } else {
            $dotenvSrc = ROOT_DIRECTORY . self::SRC_APP_ETC_DOTENV_FILE;
            \copy($dotenvSrc, $dotenvDest);
        }

        $magentoBootstrapFile = ROOT_DIRECTORY . self::MAGENTO_BOOTSTRAP_FILE;
        if (!\is_file($magentoBootstrapFile)) {
            return;
        }

        require_once $dotenvDest;
    }

    /**
     * @param bool $usePutEnv
     * @param string $envKey
     * @param string $debugKey
     * @param string $envFilePath
     * @return SymfonyDotenv
     */
    public static function get(
        bool $usePutEnv = false,
        string $envKey = self::ENV_KEY,
        string $debugKey = self::DEBUG_KEY,
        string $envFilePath = ''
    ): SymfonyDotenv {
        if ($envFilePath !== '') {
            $envFilePath = $envFilePath . DIRECTORY_SEPARATOR;
        }

        $dotenv = new SymfonyDotenv($envKey, $debugKey);
        $dotenv->usePutEnv($usePutEnv);
        $dotenv->loadEnv(ROOT_DIRECTORY . $envFilePath . self::ENV_FILE);

        return $dotenv;
    }
}
