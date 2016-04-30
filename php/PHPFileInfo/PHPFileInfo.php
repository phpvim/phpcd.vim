<?php

namespace PHPCD\PHPFileInfo;

interface PHPFileInfo
{
    /**
     * @return string
     */
    public function getNamespace();

    /**
     * @return string
     */
    public function getClass();

    /**
     * @return string
     */
    public function getImports();

    /**
     * @param array     $new_class_params {
     *  @type string    $alias
     *  @type string    $full_path
     *  }
     *
     * @return array {
     *  @type string        $alias        the original or modified alias
     *  @type string|null   $full_path    null if we have no new import to do
     *  }
     */
    public function getFixForNewClassUsage(array $new_class_params);
}
