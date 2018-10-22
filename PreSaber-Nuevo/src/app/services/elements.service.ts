import {Injectable} from "@angular/core";

import {Observable} from "rxjs/Observable";
import {HttpClient, HttpHeaders} from "@angular/common/http";
import {GLOBAL} from "./global";

import {ToastData, ToastOptions, ToastyService} from 'ng2-toasty';
import {OnInit} from "@angular/core";
import {Router} from "@angular/router";
import swal from 'sweetalert2';
import {Se_users} from "../models/security/se_users";


declare var alertify: any;
declare var PNotify: any;

@Injectable()
export class ElementsService implements OnInit {
  public positon: string;
  public url: string;
  public user: any;
  public userIdentity: any;
  public home: string;
  public ObjUser: Se_users;

  constructor(public _http: HttpClient, private _Router: Router, private toastyService: ToastyService) {
    this.url = GLOBAL.url;
    this.positon = 'top-right';
    this.ObjUser = new Se_users('', '', '', '', '', '',
      '', '', '', '', '', '', '', '');
  }

  ngOnInit() {

  }


  pi_poAlertaSuccess(mensaje, titulo) {

    this.positon = 'top-right';
    const toastOptions: ToastOptions = {
      title: titulo,
      msg: mensaje,
      showClose: true,
      timeout: 5000,
      theme: 'material'
    };
    this.toastyService.success(toastOptions);
  }

  pi_poAlertaError(mensaje, titulo) {
    this.positon = 'top-right';
    const toastOptions: ToastOptions = {
      title: titulo,
      msg: mensaje,
      showClose: true,
      timeout: 5000,
      theme: 'material'
    };
    this.toastyService.error(toastOptions);
  }

  pi_poAlertaWarning(mensaje, titulo) {
    this.positon = 'top-right';
    const toastOptions: ToastOptions = {
      title: titulo,
      msg: mensaje,
      showClose: true,
      timeout: 5000,
      theme: 'material'
    };
    this.toastyService.warning(toastOptions);
  }

  pi_poAlertaMensaje(mensaje, titulo) {
    this.positon = 'top-right';
    const toastOptions: ToastOptions = {
      title: titulo,
      msg: mensaje,
      showClose: true,
      timeout: 5000,
      theme: 'material'
    };
    this.toastyService.info(toastOptions);
  }

  pi_poBontonDesabilitar(idBoton) {
    $(idBoton).attr('disabled', 'disabled');
  }

  pi_poBotonHabilitar(idBoton) {
    $(idBoton).removeAttr('disabled')
  }

  pi_poValidarUsuario(nombreVista) {
    this.userIdentity = this.getUserIdentity();
    let validacion = 0;
    if (this.userIdentity != null) {
      if (this.userIdentity.estado.toLowerCase() != 'pendiente') {
        for (let i in this.userIdentity.permisos) {
          if (this.userIdentity.permisos[i].se_menu_component_name == nombreVista) {
            validacion = 1;
          }
        }
        if (validacion == 1) {

        } else {
          this.home = this.userIdentity.rol_descripcion;
          this._Router.navigate([this.userIdentity.permisos[0].se_menu_rute]);
          let posisicon = 0;
          let validacion = 0
          for (var i = 0; i < this.userIdentity.permisos.length; i++) {
            if (this.userIdentity.permisos[i].se_menu_default_page == '1' || this.userIdentity.permisos[i].se_menu_default_page == true) {
              validacion = 1;
              posisicon = i;

            }
          }
          if (validacion == 1) {
            this._Router.navigate([this.userIdentity.permisos[posisicon].se_menu_rute]);
            swal(
              'Cancelled',
              'Lo sentimos, no cuentas con los permisos suficientes para ingresar a este modulo',
              'error'
            );
          } else {
            this.pi_poVentanaAlertaWarning('LTE-001', 'Lo sentimos, por favor comunicarse con el ' +
              'Departamento de sistemas, No se encontro la pagina predeterminada')
          }
        }
      } else {
        let posisicon = 0;
        let validacion = 0
        for (var i = 0; i < this.userIdentity.permisos.length; i++) {
          if (this.userIdentity.permisos[i].se_menu_default_page == '1' || this.userIdentity.permisos[i].se_menu_default_page == true) {
            validacion = 1;
            posisicon = i;

          }
        }
        if (validacion == 1) {
          this._Router.navigate([this.userIdentity.permisos[posisicon].se_menu_rute]);
        }
        this.ObjUser.se_user_email = this.userIdentity.documento
        swal.mixin({
          input: 'password',
          showCancelButton: false,
          confirmButtonText: 'Verificar!',
          showLoaderOnConfirm: true,
          allowOutsideClick: false,
          allowEscapeKey: false,
          progressSteps: ['1', '2']
        }).queue([
          {
            title: 'Codigo de activacion',
            text: 'Por favor ingresar el codigo de activacion que fue enviado a su correo electronico'
          },
          {
            title: 'Cambio de contraseña',
            text: 'Por seguridad es necesario que ingrese la nueva contraseña de tu cuenta'
          },
        ]).then((result) => {
          if (result.value) {
            if (result.value[0].trim() != '' && result.value[0].trim() != ''){
              this.ObjUser.se_user_code = result.value[0];
              this.ObjUser.se_user_password = result.value[1];
              this.validateCode(localStorage.getItem('token'), this.ObjUser).subscribe(
                respuesta => {
                  if (respuesta.status == 'success') {
                    this.pi_poVentanaAlertaWarning(respuesta.code, respuesta.msg);
                    this.userIdentity.estado = 'activo';
                    localStorage.setItem('userIdentityltesoftware',JSON.stringify(this.userIdentity));
                    if (validacion == 1) {
                      this._Router.navigate([this.userIdentity.permisos[posisicon].se_menu_rute]);
                    }
                  } else {
                    this.pi_poAlertaError(respuesta.msg,respuesta.code);
                    this.validate();
                  }
                }, error2 => {

                }
              )
            }else
            {
              this.pi_poAlertaError('Todos los campos son requeridos','1000');
              this.validate();
            }

          }
        })
      }

    } else {
      this._Router.navigate(['']);
    }
  }

  validate() {
    let posisicon = 0;
    let validacion = 0
    for (var i = 0; i < this.userIdentity.permisos.length; i++) {
      if (this.userIdentity.permisos[i].se_menu_default_page == '1' || this.userIdentity.permisos[i].se_menu_default_page == true) {
        validacion = 1;
        posisicon = i;

      }
    }
    if (validacion == 1) {
      this._Router.navigate([this.userIdentity.permisos[posisicon].se_menu_rute]);
    }
    this.ObjUser.se_user_email = this.userIdentity.documento;
    swal.mixin({
      input: 'password',
      showCancelButton: false,
      confirmButtonText: 'Verificar!',
      showLoaderOnConfirm: true,
      allowOutsideClick: false,
      allowEscapeKey: false,
      progressSteps: ['1', '2']
    }).queue([
      {
        title: 'Codigo de activacion',
        text: 'Por favor ingresar el codigo de activacion que fue enviado a su correo electronico'
      },
      {
        title: 'Cambio de contraseña',
        text: 'Por seguridad es necesario que ingrese la nueva contraseña de tu cuenta'
      },
    ]).then((result) => {
      if (result.value) {
        if (result.value[0].trim() != '' && result.value[0].trim() != ''){
          this.ObjUser.se_user_code = result.value[0];
          this.ObjUser.se_user_password = result.value[1];
          this.validateCode(localStorage.getItem('token'), this.ObjUser).subscribe(
            respuesta => {
              if (respuesta.status == 'success') {
                this.pi_poVentanaAlertaWarning(respuesta.code, respuesta.msg);
                this.userIdentity.estado = 'activo';
                localStorage.setItem('userIdentityltesoftware',JSON.stringify(this.userIdentity));
                if (validacion == 1) {
                  this._Router.navigate([this.userIdentity.permisos[posisicon].se_menu_rute]);
                }
              } else {
                this.pi_poAlertaError(respuesta.msg,respuesta.code);
                this.validate();
              }
            }, error2 => {

            }
          )
        }else
        {

          this.pi_poAlertaError('Todos los campos son requeridos','1000');
          this.validate();
        }

      }
    })
  }

  pi_poValidarCodigo(respuesta) {

    switch (respuesta.code) {
      case '1008':
        swal({
          title: respuesta.code,
          text: respuesta.msg,
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Iniciar sesion',
          confirmButtonClass: 'btn btn-success',
        });
        localStorage.removeItem('token');
        localStorage.removeItem('userIdentityltesoftware');
        localStorage.removeItem('ficha');
        break;
      default:
    }

  }

  pi_poLoader(visible) {
    if (visible == true) {
      $("#loader").show();
    } else {
      $("#loader").hide();
    }
  }

  pi_poVentanaAlerta(titulo, mensaje) {
    swal({
      title: titulo,
      text: mensaje,
      type: 'success'
    }).catch(swal.noop);
  }

  pi_poVentanaAlertaWarning(titulo, mensaje) {
    swal({
      title: titulo,
      text: mensaje,
      type: 'warning'
    }).catch(swal.noop);
  }

  alerts(tipe, msg) {
    let data = '';
    if (tipe == 1 || tipe == '1') {
      data = '<div class="alert alert-success icons-alert" style="margin-bottom: 0px;">' +
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '<i class="icofont icofont-close-line-circled"></i>' +
        '</button>\n' +
        '<p><strong>Bien hecho!</strong>  <code>' + msg + '</code></p>' +
        '</div>';
    } else if (tipe == 2 || tipe == '2') {
      data = '<div class="alert alert-warning icons-alert" style="margin-bottom: 0px;">' +
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '<i class="icofont icofont-close-line-circled"></i>' +
        '</button>\n' +
        '<p><strong>Cuidado!</strong>  <code>' + msg + '</code></p>' +
        '</div>';
    } else if (tipe == 3 || tipe == '3') {
      data = '<div class="alert alert-danger icons-alert" style="margin-bottom: 0px;">' +
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '<i class="icofont icofont-close-line-circled"></i>' +
        '</button>\n' +
        '<p><strong>Error!</strong>  <code>' + msg + '</code></p>' +
        '</div>';
    } else {

    }
    return data;
  }


  //Traer usuario de local storage
  getUserIdentity() {
    let usuario = JSON.parse(localStorage.getItem('userIdentityltesoftware'));

    if (usuario != 'undefined') {
      this.user = usuario;
    } else {
      this.user = null;
    }

    return this.user;
  }

  validateCode(token, objUser): Observable<any> {
    let jsonUser = JSON.stringify(objUser);
    let parametros = 'token=' + token + '&json=' + jsonUser;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._http.post(this.url + 'api-security/users/validateCode', parametros, {headers: header})
  }
}


