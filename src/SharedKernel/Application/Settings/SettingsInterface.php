<?php
declare(strict_types=1);

namespace App\SharedKernel\Application\Settings;

interface SettingsInterface
{
    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key = '');

    /**
     * To be able to get settings under more than one keys, use this method
     * @param string ...$keys Each key must be ordered from top to inner.
     *                          E.g. In array of $settings['one']['two']['three'], to get the value of 'three'
     *                          give the parameter like this:
     *                          'one', 'two', 'three'
     * @return mixed
     */
    public function getIterative(string ...$keys);
}