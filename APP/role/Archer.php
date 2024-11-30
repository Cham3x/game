<?php
class Archer extends Role {
    public function __construct() {
        parent::__construct("Archer", [
            'pv' => 15,
            'endurance' => 10,
            'mana' => 5,
            'force' => 10,
            'constitution' => 10,
            'agilite' => 15,
            'precision' => 20,
            'intelligence' => 10,
            'resistance' => 5
        ]);
    }
}
