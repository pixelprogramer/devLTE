import {Component, OnInit} from '@angular/core';
import {ElementsService} from "../../../services/elements.service";
import {Se_rols} from "../../../models/security/se_rols";
import {Se_menus} from "../../../models/security/se_menus";
import {Se_sub_menus} from "../../../models/security/se_sub_menus";
import {Se_headers} from "../../../models/security/se_headers";
import swal from "sweetalert2";
import {RolService} from "../../../services/security/rol.service";
import {MenuService} from "../../../services/security/menu.service";
import {HeaderService} from "../../../services/security/header.service";
import {SubMenuService} from "../../../services/security/subMenu.service";

@Component({
  selector: 'app-manager-menu',
  templateUrl: './manager-menu.component.html',
  styleUrls: ['./manager-menu.component.scss'],
  providers: [ElementsService, RolService, MenuService, HeaderService, SubMenuService]
})
export class ManagerMenuComponent implements OnInit {

  public token: any;
  public listRol: Array<Se_rols>;
  public listMenuTodo: Array<any>;
  public objRol: Se_rols;
  public estadoFlechas: any;
  public listMenu: Array<Se_menus>;
  public seleccionCabezera: any;
  public objSubMenu: Se_sub_menus;
  public nombreCabezera: any;
  public nuevaCabezera: any;
  public objCabezera: Se_headers;
  position = "top-right";

  constructor(private _ElementService: ElementsService,
              private _RolService: RolService,
              private _MenuService: MenuService,
              private _HeaderService: HeaderService,
              private _SubMenuService: SubMenuService) {
    this.objRol = new Se_rols('', '', '000', '', '', '1');
    this.objSubMenu = new Se_sub_menus('', '', '', '000', '', '');
    this.objCabezera = new Se_headers('', '', 'ACTIVO', '', '', '', '', '1');
    this.token = localStorage.getItem('token');
    this.estadoFlechas = false;
    this.nuevaCabezera = false;
    this.seleccionCabezera = null;
    this.nombreCabezera = '';
  }

  ngOnInit() {
    this._ElementService.pi_poLoader(false);
    this._ElementService.pi_poValidarUsuario('ManagerMenuComponent');
    this.listarRoles();
    this.listarItemsMenu();
  }

  listarRoles() {
    this._ElementService.pi_poLoader(true);
    this._RolService.listRol(this.token).subscribe(
      respuesta => {
        this._ElementService.pi_poValidarCodigo(respuesta);
        if (respuesta.status == 'success') {
          if (respuesta.data != 0) {
            this.listRol = respuesta.data;
            this._ElementService.pi_poLoader(false);
          } else {
            this.listRol = [];
            this._ElementService.pi_poLoader(false);
          }
        } else {

        }
      }, error2 => {

      }
    )
  }

  motrarMenu() {
    this.listarMenu();
    this.seleccionCabezera = null;
    this.nombreCabezera = '';

  }

  listarMenu() {
    this._ElementService.pi_poLoader(true);
    if (this.objRol.se_rol_id != '') {
      this._MenuService.listMenusComplet(this.token, this.objRol).subscribe(
        respuesta => {
          this._ElementService.pi_poValidarCodigo(respuesta);
          if (respuesta.status == 'success') {
            if (respuesta.data != 0) {
              this.listMenuTodo = respuesta.data;
              this._ElementService.pi_poLoader(false);
            } else {
              this.listMenuTodo = [];
              this._ElementService.pi_poLoader(false);
            }
          } else {
            this._ElementService.pi_poVentanaAlertaWarning(respuesta.code, respuesta.msg);
            this.listMenuTodo = [];
            this._ElementService.pi_poLoader(false);
          }
        }
      )
    } else {
      this.listMenuTodo = [];
      this._ElementService.pi_poLoader(false);
    }
  }

  cambiarPrioridadCabezera(tipo, objCabezera) {

    var nuevaPrioridad;
    if (tipo == 'arriba') {
      nuevaPrioridad = objCabezera.prioridad_cabezera - 1;
      if (nuevaPrioridad > 0) {
        for (var i = 0; i < this.listMenuTodo.length; i++) {
          if (this.listMenuTodo[i].prioridad_cabezera == nuevaPrioridad) {
            this.listMenuTodo[i].prioridad_cabezera = objCabezera.prioridad_cabezera;
          }
        }
        for (var i = 0; i < this.listMenuTodo.length; i++) {
          if (this.listMenuTodo[i].id_cabezera == objCabezera.id_cabezera) {
            this.listMenuTodo[i].prioridad_cabezera = nuevaPrioridad;
          }
        }
        this.listMenuTodo.sort(function (a, b) {
          return (a.prioridad_cabezera - b.prioridad_cabezera)
        })
        this.actualizarPrioridad();
      } else {
        this._ElementService.pi_poAlertaError('Lo sentimos, este item ya alcanzo su maxima prioridad', 'LTE-000');
      }

    } else if (tipo == 'abajo') {
      nuevaPrioridad = (parseInt(objCabezera.prioridad_cabezera) + parseInt('1'));
      if (nuevaPrioridad <= this.listMenuTodo.length) {
        for (var i = 0; i < this.listMenuTodo.length; i++) {
          if (this.listMenuTodo[i].prioridad_cabezera == nuevaPrioridad) {
            this.listMenuTodo[i].prioridad_cabezera = objCabezera.prioridad_cabezera;
          }
        }
        for (var i = 0; i < this.listMenuTodo.length; i++) {
          if (this.listMenuTodo[i].id_cabezera == objCabezera.id_cabezera) {
            this.listMenuTodo[i].prioridad_cabezera = nuevaPrioridad;
          }
        }
        this.listMenuTodo.sort(function (a, b) {
          return (a.prioridad_cabezera - b.prioridad_cabezera)
        })
        this.actualizarPrioridad();
      } else {
        this._ElementService.pi_poAlertaError('Lo sentimos, este item ya alcanzo su minima prioridad', 'LTE-000');
      }
    }
  }

  cambiarPrioridadSubMenu(tipo, objSubmenu, cabezera) {

    var id_cabezera;
    for (let i = 0; i < this.listMenuTodo.length; i++) {
      if (this.listMenuTodo[i].id_cabezera == cabezera.id_cabezera) {
        id_cabezera = i
      }
    }
    var nuevaPrioridad;
    if (tipo == 'arriba') {
      nuevaPrioridad = objSubmenu.prioridad_submenu - 1;
      if (nuevaPrioridad > 0) {
        for (var i = 0; i < this.listMenuTodo[id_cabezera].subMenus.length; i++) {
          if (this.listMenuTodo[id_cabezera].subMenus[i].prioridad_submenu == nuevaPrioridad) {
            this.listMenuTodo[id_cabezera].subMenus[i].prioridad_submenu = objSubmenu.prioridad_submenu;
          }
        }
        for (var i = 0; i < this.listMenuTodo[id_cabezera].subMenus.length; i++) {
          if (this.listMenuTodo[id_cabezera].subMenus[i].id_menu == objSubmenu.id_menu) {
            this.listMenuTodo[id_cabezera].subMenus[i].prioridad_submenu = nuevaPrioridad;
          }
        }
        this.listMenuTodo[id_cabezera].subMenus.sort(function (a, b) {
          return (a.prioridad_submenu - b.prioridad_submenu)
        })
        this.actualizarPrioridad();
      } else {
        this._ElementService.pi_poAlertaError('Lo sentimos, este item ya alcanzo su maxima prioridad', 'LTE-000');
      }

    } else if (tipo == 'abajo') {
      nuevaPrioridad = (parseInt(objSubmenu.prioridad_submenu) + parseInt('1'));
      if (nuevaPrioridad <= this.listMenuTodo[id_cabezera].subMenus.length) {
        for (var i = 0; i < this.listMenuTodo[id_cabezera].subMenus.length; i++) {
          if (this.listMenuTodo[id_cabezera].subMenus[i].prioridad_submenu == nuevaPrioridad) {
            this.listMenuTodo[id_cabezera].subMenus[i].prioridad_submenu = objSubmenu.prioridad_submenu;
          }
        }
        for (var i = 0; i < this.listMenuTodo[id_cabezera].subMenus.length; i++) {
          if (this.listMenuTodo[id_cabezera].subMenus[i].id_menu == objSubmenu.id_menu) {
            this.listMenuTodo[id_cabezera].subMenus[i].prioridad_submenu = nuevaPrioridad;
          }
        }
        this.listMenuTodo[id_cabezera].subMenus.sort(function (a, b) {
          return (a.prioridad_submenu - b.prioridad_submenu)
        })
        this.actualizarPrioridad();
      } else {
        this._ElementService.pi_poAlertaError('Lo sentimos, este item ya alcanzo su minima prioridad', 'LTE-000');
      }
    }
  }

  actualizarPrioridad() {
    this._HeaderService.updatedPriorityMenuHeader(this.token, this.listMenuTodo).subscribe(
      respuesta => {
        this._ElementService.pi_poValidarCodigo(respuesta);
        if (respuesta.status == 'success') {
          this._ElementService.pi_poAlertaSuccess(respuesta.msg, respuesta.code);
        } else {

        }
      }, error2 => {

      }
    )
  }

  listarItemsMenu() {
    this._ElementService.pi_poLoader(true);
    this._MenuService.listMenus(this.token).subscribe(
      respuesta => {
        this._ElementService.pi_poValidarCodigo(respuesta);
        if (respuesta.status == 'success') {
          this.listMenu = respuesta.data;
          this._ElementService.pi_poLoader(false);
        } else {
          this._ElementService.pi_poVentanaAlertaWarning(respuesta.code, respuesta.msg);
          this._ElementService.pi_poLoader(false);
        }
      }, error2 => {

      }
    )
  }

  seleccionarEncabezado(encabezado) {
    this.seleccionCabezera = encabezado;
    console.log(this.seleccionCabezera);
    this.nombreCabezera = this.seleccionCabezera.descripcion_cabezera;
  }

  seleccionSubMenu(sub) {
    if (this.seleccionCabezera != null) {
      this.objSubMenu.se_header_id_fk_seub_menu = this.seleccionCabezera.id_cabezera;
      this.objSubMenu.se_menu_id_fk_sub_menu = sub.se_menu_id;
      this.objSubMenu.se_sub_menu_state = 'ACTIVO';
      console.log(this.listMenuTodo);
      if (this.validarNuevoSub(this.objSubMenu) == false) {
        this._ElementService.pi_poLoader(true);
        this._SubMenuService.newSubMenu(this.token, this.objSubMenu).subscribe(
          respuesta => {
            this._ElementService.pi_poValidarCodigo(respuesta);
            if (respuesta.status == 'success') {
              this.listarMenu();
              this._ElementService.pi_poLoader(false);
            }
          }, error2 => {
            this._ElementService.pi_poLoader(false);
          }
        )
      } else {
        this._ElementService.pi_poVentanaAlertaWarning('1000', 'Lo sentimos, este seubMenu ya esta agregado en esta cabezera');
        this._ElementService.pi_poLoader(false);
      }
    } else {
      this._ElementService.pi_poVentanaAlertaWarning('1000', 'Lo sentimos, no se ha seleccionado una cabezera');
      this._ElementService.pi_poLoader(false);
    }
  }

  validarNuevoSub(objSub) {
    for (var i = 0; i < this.listMenuTodo.length; i++) {
      if (this.listMenuTodo[i].id_cabezera == objSub.se_header_id_fk_seub_menu) {
        for (var j = 0; j < this.listMenuTodo[i].subMenus.length; j++) {
          if (this.listMenuTodo[i].subMenus[j].se_menu_id == objSub.se_menu_id_fk_sub_menu) {
            return true;
          }
        }
      }
    }
    return false;
  }


  eliminarSubMenuMenu(subMenu) {
    swal({
      title: '1000',
      text: 'Esta seguro de eliminar este submenu',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Eliminar'
    }).then((result) => {
      $("#loaderUsuario").show();
      if (result.value) {
        this._ElementService.pi_poLoader(true);
        this._SubMenuService.deletedSubMenu(this.token, subMenu).subscribe(
          respuesta => {
            this._ElementService.pi_poValidarCodigo(respuesta);
            if (respuesta.status == 'success') {
              this.listarMenu();
              this._ElementService.pi_poLoader(false);
            } else {
              this._ElementService.pi_poLoader(false);
            }
          }, error2 => {
            this._ElementService.pi_poLoader(false);
          }
        )
      }
    });
  }


  crearCabezera() {
    this._ElementService.pi_poLoader(true);
    if (this.objRol.se_rol_id != '') {
      if (this.objCabezera.se_header_description != '') {
        this.objCabezera.se_rol_id_fk_header = this.objRol.se_rol_id;
        this.objCabezera.se_header_state = 'ACTIVO';
        this._HeaderService.newHeader(this.token, this.objCabezera).subscribe(
          respuesta => {
            this._ElementService.pi_poValidarCodigo(respuesta);
            if (respuesta.status == 'success') {
              this.objCabezera.se_header_description = '';
              this.listarMenu();
              this._ElementService.pi_poLoader(false);
            } else {
              this._ElementService.pi_poLoader(false);
            }
          }, error2 => {
            this._ElementService.pi_poLoader(false);
          }
        )
      } else {
        this._ElementService.pi_poAlertaError('Lo sentimos, el nombre de la cabezera es requerido', 'LTE-000');
        this._ElementService.pi_poLoader(false);
      }

    } else {
      this._ElementService.pi_poVentanaAlertaWarning('LTE-000', 'Lo sentimos, no se ha seleccionado un permiso');
      this._ElementService.pi_poLoader(false);
    }
  }

}

