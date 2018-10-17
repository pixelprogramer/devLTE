import { Component, OnInit } from '@angular/core';
import {Se_rols} from "../../../models/security/se_rols";
import {ElementsService} from "../../../services/elements.service";
import {RolService} from "../../../services/security/rol.service";

@Component({
  selector: 'app-new-rol',
  templateUrl: './new-rol.component.html',
  styleUrls: ['./new-rol.component.scss'],
  providers: [ElementsService,RolService]
})
export class NewRolComponent implements OnInit {
  public objRol: Se_rols;
  public listRol: Array<Se_rols>;
  public token: any;
  position = "top-right";
  constructor(private _ElementService: ElementsService,
              private _RolService: RolService) {
    this.objRol = new Se_rols('', '',
      '000', '', '','1');
    this.token = localStorage.getItem('token');
  }

  ngOnInit() {
    this._ElementService.pi_poValidarUsuario('NewRolComponent');
    this.listarRoles();
    this._ElementService.pi_poLoader(false);
  }

  listarRoles() {
  this._ElementService.pi_poLoader(true);
    this._RolService.listRol(this.token).subscribe(
      respuesta => {
        this._ElementService.pi_poValidarCodigo(respuesta);
        if (respuesta.status == 'success') {
          if (respuesta.data != 0) {
            this.listRol = respuesta.data;
            $("#loaderTablaRoles").hide();
            this._ElementService.pi_poLoader(false);
          } else {
            this.listRol = [];
            $("#loaderTablaRoles").hide();
            this._ElementService.pi_poLoader(false);
          }
        } else {
          this._ElementService.pi_poVentanaAlertaWarning(respuesta.code, respuesta.msg);
          $("#loaderTablaRoles").hide();
          this._ElementService.pi_poLoader(false);
        }

      }, error2 => {

      }
    )
  }

  newRol() {
    this._ElementService.pi_poLoader(true);
    this._RolService.newRol(this.token, this.objRol).subscribe(
      respuesta => {
        this._ElementService.pi_poValidarCodigo(respuesta);
        if (respuesta.status == 'success') {
          this._ElementService.pi_poAlertaSuccess(respuesta.msg,respuesta.code);
          this.listarRoles();
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
  }

  updatedRol() {
    this._ElementService.pi_poLoader(true);
    if  (this.objRol.se_rol_id !=''){
      this._RolService.updatedRol(this.token, this.objRol).subscribe(
        respuesta => {
          this._ElementService.pi_poValidarCodigo(respuesta);
          if (respuesta.status == 'success') {
            this._ElementService.pi_poAlertaSuccess(respuesta.msg,respuesta.code);
            this.listarRoles();
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
    }else {
      this._ElementService.pi_poAlertaError('Lo sentimos, por favor seleccione un rol','1000');
      this._ElementService.pi_poLoader(false);
    }

  }

  limpiarCampos(){
    this.objRol = new Se_rols('', '',
      '000', '', '','1');
  }
  seleccionarRol(Rol){
    this.objRol = Rol;
    this._ElementService.pi_poAlertaMensaje('Se selecciono el rol: '+this.objRol.se_rol_description,'LTE-000');
  }
  reset(){
    this.listarRoles();
    this.objRol = new Se_rols('000', '',
      '000', '', '','1');
  }

}
