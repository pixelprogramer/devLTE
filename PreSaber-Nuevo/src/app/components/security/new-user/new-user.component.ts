import {Component, OnInit} from '@angular/core';
import {ElementsService} from "../../../services/elements.service";
import {Se_users} from "../../../models/security/se_users";
import {Se_profiles} from "../../../models/security/se_profiles";
import {Se_rols} from "../../../models/security/se_rols";
import {RolService} from "../../../services/security/rol.service";
import {UserService} from "../../../services/security/user.service";

@Component({
  selector: 'app-new-user',
  templateUrl: './new-user.component.html',
  styleUrls: ['./new-user.component.scss'],
  providers: [ElementsService, RolService, UserService]
})
export class NewUserComponent implements OnInit {
  public token: any;
  public objUser: Se_users;
  public objProfile: Se_profiles;
  public listRol: Array<Se_rols>;
  public listUser: Array<any>;
  position = "top-right";
  constructor(private _ElementService: ElementsService,
              private _RolService: RolService,
              private _UserService: UserService) {
    this._ElementService.pi_poValidarUsuario('NewUserComponent');
    this.token = localStorage.getItem('token');
    this.objUser = new Se_users('', '', '', '', '', '', '',
      '000', '', '', '', '', '');
    this.objProfile = new Se_profiles('', '', '', '', '', '',
      '', '', '', '000', '', '', '1', '');
  }

  ngOnInit() {
    this.listRolFunction();
    this.listUserFunction();
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
  reset(){
    this._ElementService.pi_poLoader(true);
    this.listUserFunction();
    this.objUser = new Se_users('', '', '', '', '', '', '',
      '000', '', '', '', '', '');
    this.objProfile = new Se_profiles('', '', '', '', '', '',
      '', '', '', '000', '', '', '1', '');
    this._ElementService.pi_poLoader(false);
  }
  selectUser(objUser){
    this.objUser=objUser;
    this.objProfile=objUser;
  }
  newUser(){
    if (this.objProfile.se_profile_identification.trim() != ''){
      if (this.objProfile.se_profile_name.trim() != ''){
        if (this.objProfile.se_profile_surname.trim() != ''){
          if (this.objProfile.se_profile_phone.trim() != ''){
           if (this.objUser.se_user_email.trim() != ''){
             if (this.objProfile.se_profile_state.trim() !='000'){
              if (this.objUser.se_role_id_fk_users !='000'){

              }else
              {
                this._ElementService.pi_poAlertaError('El rol es requerido','1000');
              }
             }else
             {
               this._ElementService.pi_poAlertaError('El estado es requerido','1000');
             }
           }else
           {
             this._ElementService.pi_poAlertaError('El correo es requerido','1000');
           }
          }else
          {
            this._ElementService.pi_poAlertaError('El telefono es requerido','1000');
          }
        }else
        {
          this._ElementService.pi_poAlertaError('El apellido es requerido','1000');
        }
      }else
      {
        this._ElementService.pi_poAlertaError('El nombre es requerido','1000');
      }
    }else
    {
      this._ElementService.pi_poAlertaError('El documento es requerido','1000');
    }
  }
}
