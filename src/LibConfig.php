<?php

namespace AmitxD\LibConfig;

require_once 'vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

/**
 * Class LibConfig
 */
class LibConfig {

    /**
     * @var string The path to the YAML file.
     */
    protected $file;

    /**
     * @var array The configuration data stored in the YAML file.
     */
    protected $data;

    /**
     * LibConfig constructor.
     *
     * @param string $file The path to the YAML file.
     */
    public function __construct($file)
    {
        $this->file = $file;
        $this->data = $this->read();
    }

    /**
     * Get a configuration value by key.
     *
     * @param string $key     The configuration key.
     * @param mixed  $default The default value if the key is not found.
     *
     * @return mixed The configuration value or the default value.
     */
    public function get($key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }

    /**
     * Set a configuration value by key.
     *
     * @param string $key   The configuration key.
     * @param mixed  $value The value to set.
     */
    public function set($key, $value)
    {
        $this->data[$key] = $value;
        $this->save();
    }

    /**
     * Read the configuration data from the YAML file.
     *
     * @return array The configuration data.
     */
    protected function read()
    {
        if (file_exists($this->file)) {
            return Yaml::parseFile($this->file);
        }
        return [];
    }

    /**
     * Save the configuration data to the YAML file.
     */
    public function save()
    {
        $content = Yaml::dump($this->data);
        file_put_contents($this->file, $content);
    }
}