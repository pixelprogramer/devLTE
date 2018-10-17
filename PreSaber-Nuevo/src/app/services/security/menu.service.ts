import {Observable} from "rxjs/Rx";
import {Injectable} from "@angular/core";
import {HttpHeaders} from "@angular/common/http";
import {GLOBAL} from "../global";
import {HttpClient} from "@angular/common/http";

@Injectable()

export class MenuService{
  public url:string;
  constructor(public _Http: HttpClient){
    this.url = GLOBAL.url;
  }

  listMenus(token): Observable <any>{
    let parametros = 'token='+token;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-security/menu/listMenu',parametros,{headers:header})
  }
  listMenusComplet(token,objRol): Observable <any>{
    let json = JSON.stringify(objRol);
    let parametros = 'token='+token+'&json='+json;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-security/menu/listMenuComplet',parametros,{headers:header})
  }
  newMenu(token,menu): Observable <any>{
    let json = JSON.stringify(menu);
    let parametros = 'token='+token+'&json='+json;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-security/menu/newMenu',parametros,{headers:header})
  }
  updatedMenu(token,menu): Observable <any>{
    let json = JSON.stringify(menu);
    let parametros = 'token='+token+'&json='+json;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-security/menu/updatedMenu',parametros,{headers:header})
  }
}
