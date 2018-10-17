import {Observable} from "rxjs/Rx";
import {Injectable} from "@angular/core";
import {HttpHeaders} from "@angular/common/http";
import {GLOBAL} from "../global";
import {HttpClient} from "@angular/common/http";

@Injectable()

export class SubMenuService{
  public url:string;
  constructor(public _Http: HttpClient){
    this.url = GLOBAL.url;
  }

  newSubMenu(token,objSubMenu): Observable <any>{
    let json = JSON.stringify(objSubMenu);
    let parametros = 'token='+token+'&json='+json;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-security/sub_menu/newSubMenu',parametros,{headers:header})
  }
  deletedSubMenu(token,objSubMenu): Observable <any>{
    let json = JSON.stringify(objSubMenu);
    let parametros = 'token='+token+'&json='+json;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-security/sub_menu/deletedSubeMenu',parametros,{headers:header})
  }
}
