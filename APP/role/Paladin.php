<?php
class Paladin extends Role {
    public function __construct() {
        parent::__construct("Paladin", [
            'pv' => 20,
            'endurance' => 15,
            'mana' => 10,
            'force' => 15,
            'constitution' => 15,
            'agilite' => 10,
            'precision' => 10,
            'intelligence' => 15,
            'resistance' => 20
        ]);
    }
}