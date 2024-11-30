<?php

 class Arme {
    protected int $pv;
    protected int $endurance;
    protected int $mana;
    protected int $force;
    protected int $constitution;
    protected int $agilite;
    protected int $precision;
    protected array $ArmeStats;
    protected string $name;

    public function __construct(string $name, array $ArmeStats) {
        $this->name = $name;
        $this->ArmeStats = $ArmeStats;
    }

    public function getArmeStats(): array {
        return $this->ArmeStats;
    }

    public function getName(): string {
        return $this->name;
    }
}

