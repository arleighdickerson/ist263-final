<?php
class Item extends Model {
	public function getInventory() {
		return Inventory::find ( [ 
				'itemId' => $this->id 
		] );
	}
}
