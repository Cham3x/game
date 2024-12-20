<?php
class Arc extends Arme {
    public function __construct() {
        parent::__construct("Arc", [
            'pv' => 20,
            'endurance' => 10,
            'mana' => 0,
            'force' => 10,
            'constitution' => 5,
            'agilite' => 5,
            'precision' => 5
        ]);
    }
} 