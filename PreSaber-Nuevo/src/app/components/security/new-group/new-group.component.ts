import {Component, OnInit} from '@angular/core';
import {ElementsService} from "../../../services/elements.service";
import {Se_groups} from "../../../models/security/se_groups";
import {UserService} from "../../../services/security/user.service";
import {GroupService} from "../../../services/security/group.service";

@Component({
  selector: 'app-new-group',
  templateUrl: './new-group.component.html',
  styleUrls: ['./new-group.component.scss'],
  providers: [ElementsService, UserService, GroupService]
})
export class NewGroupComponent implements OnInit {
  public objGroup: Se_groups;
  public nameCoordinate: any;
  public nameAlternate: any;
  public titleCoordinate: any;
  public listUser: Array<any>;
  public token: any;
  public typeSelection: any;

  constructor(private _ElementService: ElementsService,
              private _UserService: UserService,
              private _GroupService: GroupService) {
    this.objGroup = new Se_groups('', '', '000', '000', '000', '1');
    this.nameCoordinate = '';
    this.nameAlternate = '';
    this.titleCoordinate = 'Emty';
    this.typeSelection = '';
    this.token = localStorage.getItem('token');
  }

  ngOnInit() {
    this._ElementService.pi_poValidarUsuario('NewGroupComponent');
    this._ElementService.pi_poLoader(false);
  }

  inicialiteUser(type) {
    this._ElementService.pi_poLoader(true);
    this.typeSelection = type;
    this.listUserFunction();
    if (type == '1') {//Coordinate
      this.titleCoordinate = 'Selecccione un coordinador';
    } else //Alternate
    {
      this.titleCoordinate = 'Selecccione un sub coordinador';
    }
    this._ElementService.pi_poLoader(false);
  }

  listUserFunction() {
    this._ElementService.pi_poLoader(true);
    this._UserService.listUserClerk(this.token).subscribe(
      respuesta => {
        this._ElementService.pi_poValidarCodigo(respuesta);
        if (respuesta.status == 'success') {
          this.listUser = respuesta.data;
          this._ElementService.pi_poLoader(false);
        } else {
          this._ElementService.pi_poVentanaAlertaWarning(respuesta.msg, respuesta.code);
          this._ElementService.pi_poLoader(false);
        }
      }, error2 => {
        this._ElementService.pi_poLoader(false);
      }
    )
  }

  selectUser(usuario) {
    this._ElementService.pi_poLoader(true);
    if (this.typeSelection == '1') {
      this.nameCoordinate = usuario.se_profile_name + ' ' + usuario.se_profile_surname;
      this.objGroup.se_coordinator_id_fk_groups = usuario.se_user_id;
    } else {
      this.nameAlternate = usuario.se_profile_name + ' ' + usuario.se_profile_surname;
      this.objGroup.se_alternate_id_fk_groups = usuario.se_user_id;
    }
    this._ElementService.pi_poLoader(false);
  }

  newGroup() {
    if (this.objGroup.se_group_description.trim() != '') {
      if (this.objGroup.se_group_state != '000') {
        if (this.objGroup.se_coordinator_id_fk_groups != '000') {
          if (this.objGroup.se_alternate_id_fk_groups != '000') {
            this._ElementService.pi_poLoader(true);
            this._GroupService.newGroup(this.token, this.objGroup).subscribe(
              respuesta => {
                this._ElementService.pi_poValidarCodigo(respuesta);
                if (respuesta.status == 'success'){
                  this._ElementService.pi_poAlertaSuccess(respuesta.msg,respuesta.code);
                  this._ElementService.pi_poLoader(false);
                }else{
                  this._ElementService.pi_poVentanaAlertaWarning(respuesta.code,respuesta.msg);
                  this._ElementService.pi_poLoader(false);
                }
              }, error2 => {
                this._ElementService.pi_poLoader(false);
              }
            )
          } else {
            this._ElementService.pi_poVentanaAlertaWarning('1000', 'No se selecciono el sub coordinador');
          }
        } else {
          this._ElementService.pi_poVentanaAlertaWarning('1000', 'No se selecciono el coordinador');
        }
      } else {
        this._ElementService.pi_poVentanaAlertaWarning('1000', 'No se selecciono el estado');
      }
    } else {
      this._ElementService.pi_poVentanaAlertaWarning('1000', 'La descripcion es requerida');
    }
  }
}
