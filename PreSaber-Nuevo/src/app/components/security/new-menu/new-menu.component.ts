import {Component, OnInit} from '@angular/core';

import {Menu} from "../../../models/seguridad/menu";
import {ElementsService} from "../../../services/elements.service";
import {Se_menus} from "../../../models/security/se_menus";
import {MenuService} from "../../../services/security/menu.service";

@Component({
  selector: 'app-new-menu',
  templateUrl: './new-menu.component.html',
  styleUrls: ['./new-menu.component.scss'],
  providers: [ElementsService, MenuService]
})
export class NewMenuComponent implements OnInit {

  public objMenu: Se_menus;
  public token: any;
  public listMenu: Array<Se_menus>;
  position = "top-right";

  constructor(private _Elementservice: ElementsService, private _MenuService: MenuService) {
    this.objMenu = new Se_menus('', '', '', '',
      '000', '', '0', '1', '');
    this.token = localStorage.getItem('token');
    this._Elementservice.pi_poBontonDesabilitar('#btnActualizarMenu');
  }

  ngOnInit() {
    this._Elementservice.pi_poValidarUsuario('NewMenuComponent');
    this.listarMenu();
    $("#seccionIconos").hide();
    this._Elementservice.pi_poLoader(false);
  }

  mostrarIconos() {
    $("#seccionPrincipal").toggle(100);
    $("#seccionIconos").toggle(200);
  }

  seleccionarIcono(event) {
    this.objMenu.se_menu_icon = event;
    $("#seccionIconos").toggle(100);
    $("#seccionPrincipal").toggle(200);
  }

  limpiarCampos() {
    this.objMenu = new Se_menus('', '', '', '',
      '000', '', '0', '1', '');
  }

  listarMenu() {
    this._Elementservice.pi_poLoader(true);
    this._MenuService.listMenus(this.token).subscribe(
      respuesta => {
        this._Elementservice.pi_poValidarCodigo(respuesta);
        if (respuesta.status == 'success') {
          this.listMenu = respuesta.data;
          this._Elementservice.pi_poLoader(false);
        } else {
          this._Elementservice.pi_poVentanaAlertaWarning(respuesta.code, respuesta.msg);
          this._Elementservice.pi_poLoader(false);
        }
      }, error2 => {

      }
    )
  }

  newMenu() {
    if (this.objMenu.se_menu_id == '') {
      this._Elementservice.pi_poLoader(true);
      this._MenuService.newMenu(this.token, this.objMenu).subscribe(
        respuesta => {
          this._Elementservice.pi_poValidarCodigo(respuesta);
          if (respuesta.status == 'success') {
            this._Elementservice.pi_poAlertaSuccess(respuesta.msg, respuesta.code);
            this.listarMenu();
            this.limpiarCampos();
            this._Elementservice.pi_poLoader(false);
          } else {
            this._Elementservice.pi_poLoader(false);
          }
        }, error2 => {

        }
      )
    } else {
      this._Elementservice.pi_poAlertaWarning('Lo sentimos, Se selecciono un menu', '1000')
    }

  }

  updatedMenu() {
    this._Elementservice.pi_poLoader(true);
    if (this.objMenu.se_menu_id != '') {
      if (this.objMenu.se_menu_state != '000' || this.objMenu.se_menu_description.trim() != '') {
        this._Elementservice.pi_poBontonDesabilitar('#btnActualizarMenu');
        this._MenuService.updatedMenu(this.token, this.objMenu).subscribe(
          respuesta => {
            this._Elementservice.pi_poValidarCodigo(respuesta);
            if (respuesta.status == 'success') {
              this._Elementservice.pi_poAlertaSuccess(respuesta.msg, respuesta.code);
              this._Elementservice.pi_poBontonDesabilitar('#btnActualizarMenu');
              this._Elementservice.pi_poBotonHabilitar('#btnCrearMenu');
              this.limpiarCampos();
              this._Elementservice.pi_poLoader(false);
            } else {
              this._Elementservice.pi_poVentanaAlertaWarning(respuesta.code, respuesta.msg);
              this._Elementservice.pi_poBotonHabilitar('#btnActualizarMenu');
              this.limpiarCampos();
              this._Elementservice.pi_poLoader(false);
            }
          }, error2 => {

          }
        )
      } else {
        this._Elementservice.pi_poAlertaError('Lo sentimos, todos los campos son obligatorios', '1000');
        this._Elementservice.pi_poLoader(false);
      }
    } else {
      this._Elementservice.pi_poAlertaError('Lo sentimos, no se ha seleccionado ningun menu para actualizar', '1000');
      this._Elementservice.pi_poLoader(false);
    }


  }

  seleccionarMenu(Menu) {
    this._Elementservice.pi_poLoader(true);
    this.objMenu = Menu;
    this._Elementservice.pi_poBotonHabilitar('#btnActualizarMenu');
    this._Elementservice.pi_poBontonDesabilitar('#btnCrearMenu');
    this._Elementservice.pi_poLoader(false);
  }
}
