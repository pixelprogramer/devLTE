import {Component, OnInit} from '@angular/core';
import {ElementsService} from "../../../services/elements.service";
import {Er_inventory_types} from "../../../models/erp/er_inventory_types";
import {InventoryTypeService} from "../../../services/erp/inventoryType.service";

@Component({
  selector: 'app-inventory-type',
  templateUrl: './inventory-type.component.html',
  styleUrls: ['./inventory-type.component.scss'],
  providers: [ElementsService, InventoryTypeService]
})
export class InventoryTypeComponent implements OnInit {
  public objInventoryType: Er_inventory_types;
  public token: any;
  public listInventoryType: Array<Er_inventory_types>;

  constructor(private _ElementService: ElementsService,
              private _InventoryService: InventoryTypeService) {
    this.objInventoryType = new Er_inventory_types('', '',
      '000', '', '');
    this.token = localStorage.getItem('token');
  }

  ngOnInit() {
    this._ElementService.pi_poValidarUsuario('InventoryTypeComponent');
    this._ElementService.pi_poLoader(false);
    this.listInventoryTypeFunction();
  }

  new() {
    if (this.objInventoryType.er_inventory_type_id == '') {
      if (this.objInventoryType.er_inventory_type_description.trim() != '') {
        if (this.objInventoryType.er_inventory_type_state != '000') {
          this._ElementService.pi_poLoader(true);
          this._InventoryService.new(this.token, this.objInventoryType).subscribe(
            respuesta => {
              this._ElementService.pi_poValidarCodigo(respuesta);
              if (respuesta.status == 'success') {
                this.listInventoryTypeFunction();
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
    if (this.objInventoryType.er_inventory_type_id != ''){
      if (this.objInventoryType.er_inventory_type_description.trim() != '') {
        if (this.objInventoryType.er_inventory_type_state != '000') {
          this._ElementService.pi_poLoader(true);
          this._InventoryService.updated(this.token, this.objInventoryType).subscribe(
            respuesta => {
              this._ElementService.pi_poValidarCodigo(respuesta);
              if (respuesta.status == 'success') {
                this.listInventoryTypeFunction();
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

  listInventoryTypeFunction() {
    this._ElementService.pi_poLoader(true);
    this._InventoryService.list(this.token).subscribe(
      respuesta => {
        this._ElementService.pi_poValidarCodigo(respuesta);
        if (respuesta.status == 'success') {
          this.listInventoryType = respuesta.data;
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
    this.objInventoryType = new Er_inventory_types('', '',
      '000', '', '');
    this.listInventoryTypeFunction();
  }

  selectInventoryType(objInventoryType) {
    this.objInventoryType = objInventoryType;
  }

  reset() {
    this.objInventoryType = new Er_inventory_types('', '',
      '000', '', '');
    this.listInventoryTypeFunction();
  }
}
