import {Component, OnInit} from '@angular/core';
import {ElementsService} from "../../../services/elements.service";
import {Er_products_types} from "../../../models/erp/er_products_types";
import {Er_inventories} from "../../../models/erp/er_inventories";
import {ProductTypeService} from "../../../services/erp/productType.service";

@Component({
  selector: 'app-product-type',
  templateUrl: './product-type.component.html',
  styleUrls: ['./product-type.component.scss'],
  providers: [ElementsService, ProductTypeService]
})
export class ProductTypeComponent implements OnInit {
  public objProductType: Er_products_types;
  public listProductType: Array<Er_products_types>;
  public token: any;
  position = "top-right";

  constructor(private _ElementService: ElementsService,
              private _ProductTypeService: ProductTypeService) {
    this.objProductType = new Er_products_types('', '', '000', '', '','');
    this.token = localStorage.getItem('token');
  }

  ngOnInit() {
    this._ElementService.pi_poValidarUsuario('ProductTypeComponent');
    this._ElementService.pi_poLoader(false);
    this.listProductTypeFunction();
  }


  new() {
    if (this.validateData()) {
      if (this.objProductType.er_products_type_id == '') {
        this._ElementService.pi_poLoader(true);
        this._ProductTypeService.new(this.token, this.objProductType).subscribe(
          respuesta => {
            this._ElementService.pi_poValidarCodigo(respuesta);
            if (respuesta.status == 'success') {
              this.listProductTypeFunction();
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
        this._ElementService.pi_poAlertaError('Lo sentimos, este es un tipo de producto seleccionado', '1000');
      }
    }
  }

  updated() {
    if (this.validateData()) {
      if (this.objProductType.er_products_type_id != '') {
        this._ElementService.pi_poLoader(true);
        this._ProductTypeService.updated(this.token, this.objProductType).subscribe(
          respuesta => {
            this._ElementService.pi_poValidarCodigo(respuesta);
            if (respuesta.status == 'success') {
              this.listProductTypeFunction();
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
        this._ElementService.pi_poAlertaError('Lo sentimos, no se selecciono un tipo de producto', '1000');
      }
    }
  }

  cleanCamps() {
    this.objProductType = new Er_products_types('', '', '000', '', '','');
  }

  validateData() {
    if (this.objProductType.er_products_type_description != '') {
      if (this.objProductType.er_products_type_state != '000') {
        if (this.objProductType.er_products_type_code != '000') {
          return true;
        }else
        {
          this._ElementService.pi_poAlertaError('Lo sentimos, el codigo es requerido', '1000');
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
    this.objProductType = new Er_products_types('', '', '000', '', '','');
    this.listProductTypeFunction();
  }

  selectProductType(objProductType) {
    this.objProductType = objProductType;
  }

  listProductTypeFunction() {
    this._ElementService.pi_poLoader(true);
    this._ProductTypeService.list(this.token).subscribe(
      returned => {
        this._ElementService.pi_poValidarCodigo(returned);
        if (returned.status == 'success') {
          this.listProductType = returned.data;
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
