<?php

namespace ItemDurability;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\event\block\BlockBreakEvent;

class Main extends PluginBase implements Listener{

  public function onEnable(): void{
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }

  public function onBreak(BlockBreakEvent $e){
    if($e->isCancelled()) return;
    $item = $e->getItem();
    if($item instanceof Tool){
      $player = $e->getPlayer();
      $maxdayaniklilik = $item->getMaxDurability();
		  $dayaniklilik = $item->getDamage();
		  $kalandayaniklilik = $maxdayaniklilik - $dayaniklilik;
      $player->sendPopup("§7Kalan Can:§c " . $kalandayaniklilik);
    }
  }
}
