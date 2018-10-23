import { Component, OnInit } from '@angular/core';
import {ElementsService} from "../../../services/elements.service";
import {Er_inventory_categorys} from "../../../models/erp/er_inventory_categorys";
import {Er_inventory_types} from "../../../models/erp/er_inventory_types";
import {InventoryCategoryService} from "../../../services/erp/inventoryCategory.service";


@Component({
  selector: 'app-inventory-category',
  templateUrl: './inventory-category.component.html',
  styleUrls: ['./inventory-category.component.scss'],
  providers: [ElementsService,InventoryCategoryService]
})
export class InventoryCategoryComponent implements OnInit {
  public objInventoryCategory: Er_inventory_categorys;
  public listInventoryCategory: Array<Er_inventory_categorys>;
  public token: any;
  position = "top-right";
  constructor(private _ElementService:ElementsService,
              private _InventoryCategoryService:InventoryCategoryService) {
    this.objInventoryCategory = new Er_inventory_categorys('','',
      '000','','');
    this.token = localStorage.getItem('token');
  }

  ngOnInit() {
    this._ElementService.pi_poValidarUsuario('InventoryCategoryComponent');
    this._ElementService.pi_poLoader(false);
    this.listInventoryCategoryFunction();
  }
  new() {
    if (this.objInventoryCategory.er_inventory_category_id == '') {
      if (this.objInventoryCategory.er_inventory_category_description.trim() != '') {
        if (this.objInventoryCategory.er_inventory_category_state != '000') {
          this._ElementService.pi_poLoader(true);
          this._InventoryCategoryService.new(this.token, this.objInventoryCategory).subscribe(
            respuesta => {
              this._ElementService.pi_poValidarCodigo(respuesta);
              if (respuesta.status == 'success') {
                this.listInventoryCategoryFunction();
                this._ElementService.pi_poAlertaSuccess(respuesta.msg, respuesta.code);
                this.limpiarCampos();
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
          this._ElementService.pi_poAlertaError('Lo sentimos, el estado es requerido', '1000');
        }
      } else {
        this._ElementService.pi_poAlertaError('Lo sentimos, la descripcion es requerida', '1000');
      }
    } else {
      this._ElementService.pi_poAlertaError('Lo sentimos, No podemos crear este item por que es una seleccion', '1000');
    }

  }

  updated() {
    if (this.objInventoryCategory.er_inventory_category_id != '') {
      if (this.objInventoryCategory.er_inventory_category_description.trim() != '') {
        if (this.objInventoryCategory.er_inventory_category_state != '000') {
          this._ElementService.pi_poLoader(true);
          this._InventoryCategoryService.updated(this.token, this.objInventoryCategory).subscribe(
            respuesta => {
              this._ElementService.pi_poValidarCodigo(respuesta);
              if (respuesta.status == 'success') {
                this.listInventoryCategoryFunction();
                this._ElementService.pi_poAlertaSuccess(respuesta.msg, respuesta.code);
                this.limpiarCampos();
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
          this._ElementService.pi_poAlertaError('Lo sentimos, el estado es requerido', '1000');
        }
      } else {
        this._ElementService.pi_poAlertaError('Lo sentimos, la descripcion es requerida', '1000');
      }
    }else{
      this._ElementService.pi_poAlertaError('Lo sentimos, no se selecciono ningun item', '1000');
    }

  }

  listInventoryCategoryFunction() {
    this._ElementService.pi_poLoader(true);
    this._InventoryCategoryService.list(this.token).subscribe(
      respuesta => {
        this._ElementService.pi_poValidarCodigo(respuesta);
        if (respuesta.status == 'success') {
          this.listInventoryCategory = respuesta.data;
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

  limpiarCampos() {
    this.objInventoryCategory = new Er_inventory_categorys('','',
      '000','','');
    this.listInventoryCategoryFunction();
  }

  selectInventoryCategory(objInventoryCategory) {
    this.objInventoryCategory = objInventoryCategory;
  }

  reset() {
    this.objInventoryCategory = new Er_inventory_categorys('','',
      '000','','');
    this.listInventoryCategoryFunction();
  }
}
