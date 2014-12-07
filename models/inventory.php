<?php
class Inventory extends Model {
	public function getItem() {
		return Item::findOne ($this->itemId);
	}
	public function getLocation() {
		return Location::findOne ($this->locationId);
	}
}
