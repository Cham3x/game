<?php
 class Personnage {
     protected string $name;
     protected int $pv;
     protected int $endurance;
     protected int $mana;
     protected int $force;
     protected int $constitution;
     protected int $agilite;
     protected int $precision;
     protected int $intelligence;
     protected int $resistance;
     protected array $baseStats;
     protected Race $Race;
     protected Role $Role;
     protected Arme $Arme;
     protected bool $statut;
 
     public function __construct($name, Race $Race, Role $Role, Arme $Arme) {
         $this->name = $name;
         $this->Race = $Race;
         $this->Role = $Role;
         $this->Arme = $Arme;
 
         // Initialisation des statistiques de base
         $this->initializeStats();
     }
 
     protected function initializeStats() {
         $raceStats = $this->Race->getRaceStats();
         $roleStats = $this->Role->getRoleStats();
         $armeStats = $this->Arme->getArmeStats();
 
         // Addition des statistiques de la race, du rôle et de l'arme
         $this->pv = 100 + ($raceStats['pv'] ?? 0) + ($roleStats['pv'] ?? 0) + ($armeStats['pv'] ?? 0);
         $this->endurance = 50 + ($raceStats['endurance'] ?? 0) + ($roleStats['endurance'] ?? 0) + ($armeStats['endurance'] ?? 0);
         $this->mana = 50 + ($raceStats['mana'] ?? 0) + ($roleStats['mana'] ?? 0) + ($armeStats['mana'] ?? 0);
         $this->force = 10 + ($raceStats['force'] ?? 0) + ($roleStats['force'] ?? 0) + ($armeStats['force'] ?? 0);
         $this->constitution = 10 + ($raceStats['constitution'] ?? 0) + ($roleStats['constitution'] ?? 0) + ($armeStats['constitution'] ?? 0);
         $this->agilite = 10 + ($raceStats['agilite'] ?? 0) + ($roleStats['agilite'] ?? 0) + ($armeStats['agilite'] ?? 0);
         $this->precision = 10 + ($raceStats['precision'] ?? 0) + ($roleStats['precision'] ?? 0) + ($armeStats['precision'] ?? 0);
         $this->intelligence = 10 + ($raceStats['intelligence'] ?? 0) + ($roleStats['intelligence'] ?? 0) + ($armeStats['intelligence'] ?? 0);
         $this->resistance = 10 + ($raceStats['resistance'] ?? 0) + ($roleStats['resistance'] ?? 0) + ($armeStats['resistance'] ?? 0);
     }
 
     public function __toString(): string {
         return "Nom: {$this->name}\n" .
                "Race: {$this->Race->getName()}\n" .
                "Role: {$this->Role->getName()}\n" .
                "Arme: {$this->Arme->getName()}\n" .
                "PV: {$this->pv}\n" .
                "Endurance: {$this->endurance}\n" .
                "Mana: {$this->mana}\n" .
                "Force: {$this->force}\n" .
                "Constitution: {$this->constitution}\n" .
                "Agilité: {$this->agilite}\n" .
                "Précision: {$this->precision}\n".
                "Intelligence: {$this->intelligence}\n" .
                "Résistance: {$this->resistance}\n" ;
     }
 
     public function attaquer() {}
 
     public function defendre() {}
 
     public function deceder() {}
 
     public function crashTheGameIfLoose() {}
 }


 
 