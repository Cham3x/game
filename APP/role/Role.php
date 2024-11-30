<?php

 class Role {
    protected int $pv;
    protected int $endurance;
    protected int $mana;
    protected int $force;
    protected int $constitution;
    protected int $agilite;
    protected int $precision;
    protected array $RoleStats;
    protected string $name;

    public function __construct(string $name, array $RoleStats) {
        $this->name = $name;
        $this->RoleStats = $RoleStats;
    }

    public function getRoleStats(): array {
        return $this->RoleStats;
    }

    public function getName(): string {
        return $this->name;
    }
}




