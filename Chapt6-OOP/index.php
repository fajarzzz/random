<?php
class Robot
{
   protected $robotName;
   protected $healthPoint;
   protected $weapon;
   protected $armor;

   public function __construct($robotName, $healthPoint, Senjata $weapon, Armor $armor)
   {
      $this->robotName = $robotName;
      $this->healthPoint = $healthPoint;
      $this->weapon = $weapon;
      $this->armor = $armor;
   }

   public function getHealth()
   {
      return $this->healthPoint;
   }

   public function showProperty()
   {
      echo "Nama : " . $this->robotName . "<br>";
      echo "Health Point : " . $this->healthPoint . "<br>";
      echo "Senjata : " . $this->weapon->getWeaponName() . "<br>";
      echo "Armor : " . $this->armor->getArmorName() . "<br><br>";
   }

   public function attack(Robot $lawan)
   {
      $damage = $this->weapon->getAttackPower() - $lawan->armor->getDefense();
      $lawan->healthPoint -= $damage;
   }
}

class Senjata
{
   protected $weaponName;
   protected $attackPower;

   public function __construct($weaponName, $attackPower)
   {
      $this->weaponName = $weaponName;
      $this->attackPower = $attackPower;
   }

   public function getWeaponName()
   {
      return $this->weaponName;
   }

   public function getAttackPower()
   {
      return $this->attackPower;
   }
}

class Armor
{
   protected $armorName;
   protected $defense;

   public function __construct($armorName, $defense)
   {
      $this->armorName = $armorName;
      $this->defense = $defense;
   }

   public function getArmorName()
   {
      return $this->armorName;
   }

   public function getDefense()
   {
      return $this->defense;
   }
}

// declare object
$senjata1 = new Senjata("Pistol", 40);
$armor1 = new Armor("Baja", 10);
$robot1 = new Robot("Robot1", 100, $senjata1, $armor1);

$senjata2 = new Senjata("Pedang", 35);
$armor2 = new Armor("None", 5);
$robot2 = new Robot("Robot2", 100, $senjata2, $armor2);

// kondisi awal
echo "===================  Kondisi Awal : ================= <br>";
$robot1->showProperty();
$robot2->showProperty();
echo "================================================<br>";

echo "<br><h1>Mulai bertarung!</h1><br>";

while ($robot1->getHealth() > 0 && $robot2->getHealth() > 0) {
   echo "Robot1 menyerang robot2<br>";
   $robot1->attack($robot2);
   echo "===================  Kondisi Sekarang : ============== <br>";
   $robot1->showProperty();
   $robot2->showProperty();
   echo "===============================================<br><br>";
   echo "Robot2 menyerang robot1<br>";
   $robot2->attack($robot1);
   echo "===================  Kondisi Sekarang : ============== <br>";
   $robot1->showProperty();
   $robot2->showProperty();
   echo "===============================================<br><br>";

   if ($robot1->getHealth() <= 0) {
      echo "<br>Hasil : <b>Robot 2 Menang!</b>";
   } else {
      if ($robot2->getHealth() <= 0) {
         echo "<br>Hasil : <b>Robot 1 Menang!</b>";
      }
   }
}
