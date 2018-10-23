import {Component, OnInit} from '@angular/core';
import {ElementsService} from "../../../services/elements.service";
import {Er_inventories} from "../../../models/erp/er_inventories";
import {InventoryCategoryService} from "../../../services/erp/inventoryCategory.service";
import {Er_inventory_categorys} from "../../../models/erp/er_inventory_categorys";
import {InventoryService} from "../../../services/erp/inventory.service";

@Component({
  selector: 'app-inventory',
  templateUrl: './inventory.component.html',
  styleUrls: ['./inventory.component.scss'],
  providers: [ElementsService, InventoryCategoryService, InventoryService]
})
export class InventoryComponent implements OnInit {
  public objInventory: Er_inventories;
  public listInventaryCategory: Array<Er_inventory_categorys>;
  public listInventory: Array<any>;
  public token: any;
  position = "top-right";
  constructor(private _ElementService: ElementsService,
              private _InventoryCategryService: InventoryCategoryService,
              private _InventoryService: InventoryService) {
    this.objInventory = new Er_inventories('', '', '',
      '000', '', '', '');
    this.token = localStorage.getItem('token');
  }

  ngOnInit() {
    this._ElementService.pi_poValidarUsuario('InventoryComponent');
    this._ElementService.pi_poLoader(false);
    this.listInventoryCategoryFunction();
    this.listInventoryFunction();
  }

  listInventoryCategoryFunction() {
    this._ElementService.pi_poLoader(true);
    this._InventoryCategryService.listActive(this.token).subscribe(
      respuesta => {
        this._ElementService.pi_poValidarCodigo(respuesta);
        if (respuesta.status == 'success') {
          this.listInventaryCategory = respuesta.data;
          this._ElementService.pi_poLoader(false);
        } else {
          this._ElementService.pi_poVentanaAlertaWarning(respuesta.code, respuesta.msg);
          this._ElementService.pi_poLoader(false);
        }
      }, error2 => {
        this._ElementService.pi_poLoader(false);
      }
    )
  }

  new() {
    if (this.validateData()) {
      if (this.objInventory.er_inventory_id == '') {
        this._ElementService.pi_poLoader(true);
        this._InventoryService.new(this.token, this.objInventory).subscribe(
          respuesta => {
            this._ElementService.pi_poValidarCodigo(respuesta);
            if (respuesta.status == 'success') {
              this.listInventoryFunction();
              this.cleanCamps();
              this._ElementService.pi_poLoader(false);
            } else {
              this._ElementService.pi_poVentanaAlertaWarning(respuesta.code, respuesta.msg);
              this._ElementService.pi_poLoader(false);
            }
          }, error2 => {
            this._ElementService.pi_poLoader(false);
          }
        )
      } else {
        this._ElementService.pi_poAlertaError('Lo sentimos, este es un inventario seleccionado', '1000');
      }
    }
  }

  updated() {
    if (this.validateData()) {
      if (this.objInventory.er_inventory_id != '') {
        this._ElementService.pi_poLoader(true);
        this._InventoryService.updated(this.token, this.objInventory).subscribe(
          respuesta => {
            this._ElementService.pi_poValidarCodigo(respuesta);
            if (respuesta.status == 'success') {
              this.listInventoryFunction();
              this.cleanCamps();
              this._ElementService.pi_poLoader(false);
            } else {
              this._ElementService.pi_poVentanaAlertaWarning(respuesta.code, respuesta.msg);
              this._ElementService.pi_poLoader(false);
            }
          }, error2 => {
            this._ElementService.pi_poLoader(false);
          }
        )
      } else {
        this._ElementService.pi_poAlertaError('Lo sentimos, no se selecciono un inventario', '1000');
      }
    }
  }

  cleanCamps() {
    this.objInventory = new Er_inventories('', '', '',
      '000', '', '', '');
  }

  validateData() {
    if (this.objInventory.er_inventory_description != '') {
      if (this.objInventory.er_inventory_category_id_fk_inventories != '000') {
        if (this.objInventory.er_inventory_state != '000') {
          return true;
        } else {
          this._ElementService.pi_poAlertaError('Lo sentimos, no se selecciono el estado', '1000');
        }
      } else {
        this._ElementService.pi_poAlertaError('Lo sentimos, no se selecciono la categoria', '1000');
      }
    } else {
      this._ElementService.pi_poAlertaError('Lo sentimos, la descripcion es requerida', '1000');
    }
    return false;
  }

  reset() {
    this.listInventoryCategoryFunction();
    this.objInventory = new Er_inventories('', '', '',
      '000', '', '', '');
    this.listInventoryFunction();
  }

  selectInventory(objInventory) {
    this.objInventory = objInventory;
  }

  listInventoryFunction() {
    this._ElementService.pi_poLoader(true);
    this._InventoryService.list(this.token).subscribe(
      returned => {
        this._ElementService.pi_poValidarCodigo(returned);
        if (returned.status == 'success') {
          this.listInventory = returned.data;
          this._ElementService.pi_poLoader(false);
        } else {
          this._ElementService.pi_poVentanaAlertaWarning(returned.code, returned.msg);
          this._ElementService.pi_poLoader(false);
        }
      }, error2 => {
        this._ElementService.pi_poLoader(false);
      }
    )
  }
}
