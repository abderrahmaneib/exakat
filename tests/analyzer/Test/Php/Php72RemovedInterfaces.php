<?php

namespace Test;

include_once(dirname(dirname(dirname(dirname(__DIR__)))).'/library/Autoload.php');
spl_autoload_register('Autoload::autoload_test');
spl_autoload_register('Autoload::autoload_phpunit');
spl_autoload_register('Autoload::autoload_library');

class Php_Php72RemovedInterfaces extends Analyzer {
    /* 1 methods */

    public function testPhp_Php72RemovedInterfaces01()  { $this->generic_test('Php/Php72RemovedInterfaces.01'); }
}
?>