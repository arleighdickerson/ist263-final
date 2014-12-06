<?php
class Location extends Model {
	public function getInventory() {
		return Inventory::find ( [ 
				'locationId' => $this->id 
		] );
	}
}
