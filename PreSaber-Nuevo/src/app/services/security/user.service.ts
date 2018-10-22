import {Observable} from "rxjs/Rx";
import {Injectable} from "@angular/core";
import {HttpHeaders} from "@angular/common/http";
import {GLOBAL} from "../global";
import {HttpClient} from "@angular/common/http";

@Injectable()

export class UserService{
  public url:string;
  constructor(public _Http: HttpClient){
    this.url = GLOBAL.url;
  }

  listUser(token): Observable <any>{
    let parametros = 'token='+token;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-security/users/listUser',parametros,{headers:header})
  }
  listUserClerk(token): Observable <any>{
    let parametros = 'token='+token;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-security/users/listUserClerk',parametros,{headers:header})
  }
  listMenusComplet(token,objRol): Observable <any>{
    let json = JSON.stringify(objRol);
    let parametros = 'token='+token+'&json='+json;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-security/menu/listMenuComplet',parametros,{headers:header})
  }
  newUser(token,objProfile,objUser): Observable <any>{
    let jsonUser = JSON.stringify(objUser);
    let jsonProfile = JSON.stringify(objProfile);
    let parametros = 'token='+token+'&jsonUser='+jsonUser+'&jsonProfile='+jsonProfile;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-security/users/newUser',parametros,{headers:header})
  }
  resetPassword(token,objProfile,objUser): Observable <any>{
    let jsonUser = JSON.stringify(objUser);
    let jsonProfile = JSON.stringify(objProfile);
    let parametros = 'token='+token+'&jsonUser='+jsonUser+'&jsonProfile='+jsonProfile;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-security/users/resetPassword',parametros,{headers:header})
  }
  updatedUser(token,objProfile,objUser): Observable <any>{
    let jsonUser = JSON.stringify(objUser);
    let jsonProfile = JSON.stringify(objProfile);
    let parametros = 'token='+token+'&jsonUser='+jsonUser+'&jsonProfile='+jsonProfile;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-security/users/updated',parametros,{headers:header})
  }

}
