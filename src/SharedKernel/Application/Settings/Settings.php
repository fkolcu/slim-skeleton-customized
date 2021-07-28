<?php
declare(strict_types=1);

namespace App\SharedKernel\Application\Settings;

class Settings implements SettingsInterface
{
    private array $settings;

    /**
     * Settings constructor.
     * @param array $settings
     */
    public function __construct(array $settings)
    {
        $this->settings = $settings;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key = '')
    {
        return (empty($key)) ? $this->settings : $this->settings[$key];
    }

    public function getIterative(string ...$keys)
    {
        if (empty($keys)) {
            return $this->settings;
        }

        $tmp = null;

        foreach ($keys as $key) {
            if (is_null($tmp) && !array_key_exists($key, $this->settings)) {
                return null;
            }

            if (is_null($tmp)) {
                $tmp = $this->settings[$key];
                continue;
            }

            if (!array_key_exists($key, $tmp)) {
                return null;
            }

            $tmp = $tmp[$key];
        }

        return $tmp;
    }
}