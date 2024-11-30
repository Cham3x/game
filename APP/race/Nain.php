<?php
class Nain extends Race {
    public function __construct() {
        parent::__construct("Nain", [
            'pv' => 20,
            'endurance' => 15,
            'mana' => 5,
            'force' => 15,
            'constitution' => 15,
            'agilite' => 5,
            'precision' => 5
        ]);
    }
}