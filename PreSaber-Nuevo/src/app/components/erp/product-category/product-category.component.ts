import {Component, OnInit} from '@angular/core';
import {ElementsService} from "../../../services/elements.service";
import {Er_product_categories} from "../../../models/erp/er_product_categories";
import {ProductCategoryService} from "../../../services/erp/productCategory.service";

@Component({
  selector: 'app-product-category',
  templateUrl: './product-category.component.html',
  styleUrls: ['./product-category.component.scss'],
  providers: [ElementsService, ProductCategoryService]
})
export class ProductCategoryComponent implements OnInit {
  public objProductCategory: Er_product_categories;
  public listProductCategory: Array<Er_product_categories>;
  public token: any;
  position = "top-right";

  constructor(private _ElementService: ElementsService,
              private _ProductCategory: ProductCategoryService) {
    this.objProductCategory = new Er_product_categories('', '',
      '000', '', '');
    this.token = localStorage.getItem('token');
  }

  ngOnInit() {
    this._ElementService.pi_poValidarUsuario('ProductCategoryComponent');
  }

  new() {
    if (this.validateData()) {
      if (this.objProductCategory.er_product_category_id == '') {
        this._ElementService.pi_poLoader(true);
        this._ProductCategory.new(this.token, this.objProductCategory).subscribe(
          respuesta => {
            this._ElementService.pi_poValidarCodigo(respuesta);
            if (respuesta.status == 'success') {
              this.listProductCategoryFunction();
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
      if (this.objProductCategory.er_product_category_id != '') {
        this._ElementService.pi_poLoader(true);
        this._ProductCategory.updated(this.token, this.objProductCategory).subscribe(
          respuesta => {
            this._ElementService.pi_poValidarCodigo(respuesta);
            if (respuesta.status == 'success') {
              this.listProductCategoryFunction();
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
    this.objProductCategory = new Er_product_categories('', '',
      '000', '', '');
  }

  validateData() {
    if (this.objProductCategory.er_product_category_description != '') {
      if (this.objProductCategory.er_product_category_state != '000') {
        return true;
      } else {
        this._ElementService.pi_poAlertaError('Lo sentimos, no se selecciono el estado', '1000');
      }
    } else {
      this._ElementService.pi_poAlertaError('Lo sentimos, la descripcion es requerida', '1000');
    }
    return false;
  }

  reset() {
    this.objProductCategory = new Er_product_categories('', '',
      '000', '', '');
    this.listProductCategoryFunction();
  }

  selectProductCategory(objProductCategory) {
    this.objProductCategory = objProductCategory;
  }

  listProductCategoryFunction() {
    this._ElementService.pi_poLoader(true);
    this._ProductCategory.list(this.token).subscribe(
      returned => {
        this._ElementService.pi_poValidarCodigo(returned);
        if (returned.status == 'success') {
          this.listProductCategory = returned.data;
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
