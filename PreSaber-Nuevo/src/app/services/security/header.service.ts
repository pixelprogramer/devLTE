import {Observable} from "rxjs/Rx";
import {Injectable} from "@angular/core";
import {HttpHeaders} from "@angular/common/http";
import {GLOBAL} from "../global";
import {HttpClient} from "@angular/common/http";

@Injectable()

export class HeaderService{
  public url:string;
  constructor(public _Http: HttpClient){
    this.url = GLOBAL.url;
  }

  updatedPriorityMenuHeader(token,objMenu): Observable <any>{
    let json = JSON.stringify(objMenu);
    let parametros = 'token='+token+'&json='+json;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-security/header/updatedHeaderPriority',parametros,{headers:header})
  }
  newHeader(token,objMenu): Observable <any>{
    let json = JSON.stringify(objMenu);
    let parametros = 'token='+token+'&json='+json;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-security/header/newHeader',parametros,{headers:header})
  }
}
