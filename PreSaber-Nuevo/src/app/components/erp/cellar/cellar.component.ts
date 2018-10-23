import { Component, OnInit } from '@angular/core';
import {ElementsService} from "../../../services/elements.service";
import {Er_wineries} from "../../../models/erp/er_wineries";
import {Er_inventories} from "../../../models/erp/er_inventories";
import {CellarService} from "../../../services/erp/cellar.service";

@Component({
  selector: 'app-cellar',
  templateUrl: './cellar.component.html',
  styleUrls: ['./cellar.component.scss'],
  providers:[ElementsService,CellarService]
})
export class CellarComponent implements OnInit {
  public objCellar: Er_wineries;
  public listCellar: Array<Er_wineries>;
  public token: any;
  position = "top-right";
  constructor(private _ElementService:ElementsService,
              private _CellarService: CellarService) {
    this.objCellar = new Er_wineries('','','','000','','');
    this.token = localStorage.getItem('token');
  }

  ngOnInit() {
    this._ElementService.pi_poValidarUsuario('CellarComponent');
    this._ElementService.pi_poLoader(false);
    this.listCellarFunction();
  }

  new() {
    if (this.validateData()) {
      if (this.objCellar.er_cellar_id == '') {
        this._ElementService.pi_poLoader(true);
        this._CellarService.new(this.token, this.objCellar).subscribe(
          respuesta => {
            this._ElementService.pi_poValidarCodigo(respuesta);
            if (respuesta.status == 'success') {
              this.listCellarFunction();
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
        this._ElementService.pi_poAlertaError('Lo sentimos, esta bodega esta seleccionada', '1000');
      }
    }
  }

  updated() {
    if (this.validateData()) {
      if (this.objCellar.er_cellar_id != '') {
        this._ElementService.pi_poLoader(true);
        this._CellarService.updated(this.token, this.objCellar).subscribe(
          respuesta => {
            this._ElementService.pi_poValidarCodigo(respuesta);
            if (respuesta.status == 'success') {
              this.listCellarFunction();
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
        this._ElementService.pi_poAlertaError('Lo sentimos, no se selecciono una bodega', '1000');
      }
    }
  }

  cleanCamps() {
    this.objCellar = new Er_wineries('','','','000','','');
  }

  validateData() {
    if (this.objCellar.er_cellar_description != '') {
      if (this.objCellar.er_cellar_code!= '') {
        if (this.objCellar.er_cellar_state != '000') {
          return true;
        } else {
          this._ElementService.pi_poAlertaError('Lo sentimos, no se selecciono el estado', '1000');
        }
      } else {
        this._ElementService.pi_poAlertaError('Lo sentimos, el codigo es requerido', '1000');
      }
    } else {
      this._ElementService.pi_poAlertaError('Lo sentimos, la descripcion es requerida', '1000');
    }
    return false;
  }

  reset() {
    this.objCellar = new Er_wineries('','','','000','','');
    this.listCellarFunction();
  }

  selectCellar(objCellar) {
    this.objCellar = objCellar;
  }

  listCellarFunction() {
    this._ElementService.pi_poLoader(true);
    this._CellarService.list(this.token).subscribe(
      returned => {
        this._ElementService.pi_poValidarCodigo(returned);
        if (returned.status == 'success') {
          this.listCellar = returned.data;
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
