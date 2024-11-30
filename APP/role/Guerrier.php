<?php
class Guerrier extends Role {
    public function __construct() {
        parent::__construct("Guerrier", [
            'pv' => 20,
            'endurance' => 10,
            'mana' => 0,
            'force' => 15,
            'constitution' => 10,
            'agilite' => -5,
            'precision' => 0
        ]);
    }
}