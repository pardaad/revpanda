<?php
function autoload($class) {
  include 'lib/' . $class . '.php';
}
spl_autoload_register('autoload');