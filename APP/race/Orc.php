<?php
class Orc extends Race {
    public function __construct() {
        parent::__construct("Orc", [
            'pv' => 30,
            'endurance' => 15,
            'mana' => 0,
            'force' => 20,
            'constitution' => 10,
            'agilite' => 5,
            'precision' => 5
        ]);
    }
}