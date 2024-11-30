<?php
class Humain extends Race {
    public function __construct() {
        parent::__construct("Humain", [
            'pv' => 15,
            'endurance' => 10,
            'mana' => 10,
            'force' => 10,
            'constitution' => 10,
            'agilite' => 10,
            'precision' => 10
        ]);
    }
}