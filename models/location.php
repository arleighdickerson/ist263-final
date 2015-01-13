<?php
class Location extends Model {
	public function getInventory() {
		return Inventory::find ( [ 
				'locationId' => $this->id 
		] );
	}
	public function getItems() {
		return array_map ( function ($inv) {
			$item = $inv->getItem ();
			$item ["quantity"] = $inv->quantity;
			return $item;
		}, $this->getInventory () );
	}
	public function flatten() {
		return array_merge ( ( array ) $this, [ 
				'items' => $this->getItems ()
		] );
	}
}
