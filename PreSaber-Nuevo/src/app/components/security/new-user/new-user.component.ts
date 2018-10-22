import {Component, OnInit} from '@angular/core';
import {ElementsService} from "../../../services/elements.service";
import {Se_users} from "../../../models/security/se_users";
import {Se_profiles} from "../../../models/security/se_profiles";
import {Se_rols} from "../../../models/security/se_rols";
import {RolService} from "../../../services/security/rol.service";
import {UserService} from "../../../services/security/user.service";
import {Co_departments} from "../../../models/configuration/co_departments";
import {Co_cities} from "../../../models/configuration/co_cities";
import {Co_countries} from "../../../models/configuration/co_countries";
import {CountryService} from "../../../services/configuration/country.service";
import {DepartamentService} from "../../../services/configuration/departament.service";
import {CityService} from "../../../services/configuration/city.service";
import {NgbDateParserFormatter, NgbDatepickerConfig, NgbDateStruct} from "@ng-bootstrap/ng-bootstrap";
import {GroupService} from "../../../services/security/group.service";
import swal from "sweetalert2";

@Component({
  selector: 'app-new-user',
  templateUrl: './new-user.component.html',
  styleUrls: ['./new-user.component.scss'],
  providers: [ElementsService, RolService, UserService, CountryService, DepartamentService, CityService, GroupService]
})
export class NewUserComponent implements OnInit {
  public token: any;
  public objUser: Se_users;
  public objProfile: Se_profiles;
  public listRol: Array<Se_rols>;
  public listUser: Array<any>;
  public listCountry: Array<Co_countries>;
  public objCountry: Co_countries;
  public objDepartament: Co_departments;
  public objCity: Co_cities;
  public listDepartament: Array<Co_departments>;
  public listGroups: Array<any>;
  public listCities: Array<Co_cities>;
  fechaAplicacion: NgbDateStruct;
  position = "top-right";

  constructor(private _ElementService: ElementsService,
              private _RolService: RolService,
              private _UserService: UserService,
              private _CountryService: CountryService,
              private _DepartamentService: DepartamentService,
              private _CityService: CityService,
              public parserFormatter: NgbDateParserFormatter,
              public _config: NgbDatepickerConfig,
              private _GroupService: GroupService) {
    this.token = localStorage.getItem('token');
    this.objUser = new Se_users('', '', '', '', '', '', '',
      '000', '', '', '', '', '', '1');
    this.objProfile = new Se_profiles('', '', '', '', '', '',
      '', '-', '', '000', '', '', '1', '');
    this.objCountry = new Co_countries('', '', '', '000', '', '');
    this.objDepartament = new Co_departments('', '', '', '', '000', '', '');
    this.objCity = new Co_cities('', '', '', '', '000', '', '');
  }

  ngOnInit() {
    this._ElementService.pi_poValidarUsuario('NewUserComponent')
    this.listRolFunction();
    this.listUserFunction();
    this.listCountryFunction();
    this.listGroupsFunction();
  }

  listRolFunction() {
    this._ElementService.pi_poLoader(true);
    this._RolService.listRol(this.token).subscribe(
      respuesta => {
        this._ElementService.pi_poValidarCodigo(respuesta);
        if (respuesta.status == 'success') {
          this.listRol = respuesta.data;
          this._ElementService.pi_poLoader(false);
        } else {
          this._ElementService.pi_poAlertaError(respuesta.msg, respuesta.code);
          this._ElementService.pi_poLoader(false);
        }
      }, error2 => {
        this._ElementService.pi_poLoader(false);
      }
    )
  }

  listUserFunction() {
    this._ElementService.pi_poLoader(true);
    this._UserService.listUser(this.token).subscribe(
      respuesta => {
        this._ElementService.pi_poValidarCodigo(respuesta);
        if (respuesta.status == 'success') {
          this.listUser = respuesta.data;
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

  reset() {
    this._ElementService.pi_poLoader(true);
    this.listUserFunction();
    this.objUser = new Se_users('', '', '', '', '', '', '',
      '000', '', '', '', '', '', '');
    this.objProfile = new Se_profiles('', '', '', '', '', '',
      '', '-', '', '000', '', '', '1', '');
    this.objCountry = new Co_countries('', '', '', '000', '', '');
    this.objDepartament = new Co_departments('', '', '',
      '', '000', '', '');
    this.objCity = new Co_cities('', '', '', '', '000', '', '');
    this.listCountryFunction();
  }

  selectUser(objUser) {
    this.objCountry = objUser;
    this.listDeparmentFunction();
    this.objDepartament = objUser;
    this.listCityFunction();
    this.objUser = objUser;
    this.objProfile = objUser;
    this.fechaAplicacion = this.parserFormatter.parse(objUser.se_profile_birthdate);;
  }

  newUser() {
    if (this.objUser.se_user_id == '') {
      if (this.validatedInformationUser() == true) {
        this.objProfile.se_profile_birthdate = this.parserFormatter.format(this.fechaAplicacion);
        this._ElementService.pi_poLoader(true);
        this._UserService.newUser(this.token, this.objProfile, this.objUser).subscribe(
          respuesta => {
            this._ElementService.pi_poValidarCodigo(respuesta);
            if (respuesta.status == 'success') {
              this.listUserFunction();
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
    } else {
      this._ElementService.pi_poAlertaError('Lo sentimos esto es un usuario seleccionado', '1000');
    }
  }

  updatedUser() {
    if (this.objUser.se_user_id != '') {
      if (this.validatedInformationUser() == true) {
        this.objProfile.se_profile_birthdate = this.parserFormatter.format(this.fechaAplicacion);
        this._ElementService.pi_poLoader(true);
        this._UserService.updatedUser(this.token, this.objProfile, this.objUser).subscribe(
          respuesta => {
            this._ElementService.pi_poValidarCodigo(respuesta);
            if (respuesta.status == 'success') {
              this.listUserFunction();
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
    } else {
      this._ElementService.pi_poAlertaError('No se a seleccionado ningun usuario', '1000');
    }
  }


  validatedInformationUser() {
    if (this.objProfile.se_profile_identification.trim() != '') {
      if (this.objProfile.se_profile_name.trim() != '') {
        if (this.objProfile.se_profile_surname.trim() != '') {
          if (this.objProfile.se_profile_phone.trim() != '') {
            if (this.objUser.se_user_email.trim() != '') {
              if (this.objProfile.se_profile_state.trim() != '000') {
                if (this.objUser.se_role_id_fk_users != '000') {
                  if (this.objUser.se_group_id_fk_users != '') {
                    if (this.objProfile.co_city_id_fk_profiles != '') {
                      if (this.objProfile.se_profile_address != '') {
                        return true;
                      } else {
                        this._ElementService.pi_poAlertaError('La direccion es requerida', '1000');
                      }
                    } else {
                      this._ElementService.pi_poAlertaError('La ciudad es requerida', '1000');
                    }
                  } else {
                    this._ElementService.pi_poAlertaError('El grupo es requerido', '1000');
                  }
                } else {
                  this._ElementService.pi_poAlertaError('El rol es requerido', '1000');
                }
              } else {
                this._ElementService.pi_poAlertaError('El estado es requerido', '1000');
              }
            } else {
              this._ElementService.pi_poAlertaError('El correo es requerido', '1000');
            }
          } else {
            this._ElementService.pi_poAlertaError('El telefono es requerido', '1000');
          }
        } else {
          this._ElementService.pi_poAlertaError('El apellido es requerido', '1000');
        }
      } else {
        this._ElementService.pi_poAlertaError('El nombre es requerido', '1000');
      }
    } else {
      this._ElementService.pi_poAlertaError('El documento es requerido', '1000');
    }
    return false;
  }

  limpiarCampos() {
    this.objUser = new Se_users('', '', '', '', '', '', '',
      '000', '', '', '', '', '', '');
    this.objProfile = new Se_profiles('', '', '', '', '', '',
      '', '', '', '000', '', '', '1', '');
  }

  listCountryFunction() {
    this._ElementService.pi_poLoader(true);
    this._CountryService.listCountry(this.token).subscribe(
      respuesta => {
        this._ElementService.pi_poValidarCodigo(respuesta);
        if (respuesta.status == 'success') {
          if (respuesta.data != 0) {
            this.listCountry = respuesta.data;
            this._ElementService.pi_poAlertaSuccess(respuesta.msg, respuesta.code);
            this._ElementService.pi_poLoader(false);
          } else {
            this.listCountry = [];
            this._ElementService.pi_poLoader(false);
          }
        } else {
          this._ElementService.pi_poVentanaAlertaWarning(respuesta.code, respuesta.msg);
          this._ElementService.pi_poLoader(false)
        }
      }, error2 => {
        this._ElementService.pi_poLoader(false)
      }
    )
  }

  listDeparmentFunction() {
    if (this.objCountry.co_country_id != '') {
      this._ElementService.pi_poLoader(true);
      this._DepartamentService.listDepartament(this.token, this.objCountry.co_country_id).subscribe(
        respuesta => {
          this._ElementService.pi_poValidarCodigo(respuesta);
          if (respuesta.status == 'success') {
            if (respuesta.data != 0) {
              this.listDepartament = respuesta.data;
              this._ElementService.pi_poLoader(false);
            } else {
              this.listDepartament = [];
              this._ElementService.pi_poLoader(false);
            }

          } else {
            this._ElementService.pi_poVentanaAlertaWarning(respuesta.code, respuesta.msg);
            this._ElementService.pi_poLoader(false);
          }
        }, error2 => {

        }
      )
    } else {
      this.listDepartament = [];
      this.listCities = [];
    }

  }

  listCityFunction() {
    if (this.objDepartament.co_department_id != '') {
      this._ElementService.pi_poLoader(true);
      this._CityService.listCity(this.token, this.objDepartament.co_department_id).subscribe(
        respuesta => {
          this._ElementService.pi_poValidarCodigo(respuesta);
          if (respuesta.status == 'success') {
            if (respuesta.data != 0) {
              this.listCities = respuesta.data;
              this._ElementService.pi_poLoader(false);
            } else {
              this.listCities = [];
              this._ElementService.pi_poLoader(false);
            }
          } else {
            this._ElementService.pi_poVentanaAlertaWarning(respuesta.code, respuesta.msg);
            this._ElementService.pi_poLoader(false);
          }
        }, error2 => {

        }
      )
    } else {
      this.listCities = [];
    }
  }

  listGroupsFunction() {
    this._ElementService.pi_poLoader(true);
    this._GroupService.listGroup(this.token).subscribe(
      respuesta => {
        this._ElementService.pi_poValidarCodigo(respuesta);
        if (respuesta.status == 'success') {
          this.listGroups = respuesta.data;
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
  resetPassword(usuario){
    this.objProfile = usuario;
    this.objUser = usuario;
    swal({
      title: 'Restablecer contraseña del usuario: '+this.objProfile.se_profile_name+' '+this.objProfile.se_profile_surname,
      text: "Si restableces la contraseña va ser enviada al correo registrado de la cuenta",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, restablecer ahora!'
    }).then((result) => {
      if (result.value) {
        this._ElementService.pi_poLoader(true);
        this._UserService.resetPassword(this.token,this.objProfile,this.objUser).subscribe(
          respuesta=>{
            this._ElementService.pi_poValidarCodigo(respuesta);
            if (respuesta.status == 'success'){
              this._ElementService.pi_poLoader(false);
              swal(
                respuesta.code,
                respuesta.msg,
                'success'
              )
            }else {
              swal(
                respuesta.code,
                respuesta.msg,
                'error'
              )
              this._ElementService.pi_poLoader(false);
            }
          },error2 => {
            this._ElementService.pi_poLoader(false);
          }
        )

      }
    })
  }
}
