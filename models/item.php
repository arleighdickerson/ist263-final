<?php
class Item extends Model {
	public function getInventory() {
		return Inventory::find ( [ 
				'itemId' => $this->id 
		] );
	}
	public function getLocations() {
		return array_map ( function ($inv) {
			$loc = $inv->getLocation ();
			$loc ["quantity"] = $inv->quantity;
			return $loc;
		}, $this->getInventory () );
	}
	public function flatten() {
		return array_merge ( ( array ) $this, [ 
				'locations' => $this->getLocations () 
		] );
	}
}
