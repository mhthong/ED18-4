<?php

namespace Crysys\Base\Supports;

class Filter extends ActionHookEvent
{

    /**
     * Filters a value
     * @param string $action Name of filter
     * @param array $args Arguments passed to the filter
     * @return string Always returns the value
     */
    public function fire($action, $args)
    {
        $value = isset($args[0]) ? $args[0] : ''; // get the value, the first argument is always the value
        if (!$this->getListeners()) {
            return $value;
        }

        foreach ($this->getListeners() as $hook => $listeners) { // go through each of the priorities
            ksort($listeners);
            foreach ($listeners as $arguments) { // loop all hooks
                if ($hook === $action) { // if the hook responds to the current filter
                    $parameters = [$value];
                    for ($i = 1; $i < $arguments['arguments']; $i++) {
                        if (isset($args[$i])) {
                            $parameters[] = $args[$i]; // add arguments if it is there
                        }
                    }
                    // filter the value
                    $value = call_user_func_array($this->getFunction($arguments['callback']), $parameters);
                }
            }
        }

        return $value;
    }
}
