import { Component, OnInit } from '@angular/core';
import {ElementsService} from "../../../services/elements.service";
import {Er_inventory_categorys} from "../../../models/erp/er_inventory_categorys";

@Component({
  selector: 'app-inventory-category',
  templateUrl: './inventory-category.component.html',
  styleUrls: ['./inventory-category.component.scss'],
  providers: [ElementsService]
})
export class InventoryCategoryComponent implements OnInit {
  public objInventoryCategory: Er_inventory_categorys;
  constructor(private _ElementService:ElementsService) {
    this.objInventoryCategory = new Er_inventory_categorys('','',
      '','','');
  }

  ngOnInit() {
    this._ElementService.pi_poValidarUsuario('InventoryCategoryComponent');
    this._ElementService.pi_poLoader(false);
  }

}
