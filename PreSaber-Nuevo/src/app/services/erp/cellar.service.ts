import {Observable} from "rxjs/Rx";
import {Injectable} from "@angular/core";
import {HttpHeaders} from "@angular/common/http";
import {GLOBAL} from "../global";
import {HttpClient} from "@angular/common/http";

@Injectable()

export class CellarService{
  public url:string;
  constructor(public _Http: HttpClient){
    this.url = GLOBAL.url;
  }

  list(token): Observable <any>{
    let parametros = 'token='+token;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-erp/cellar/list',parametros,{headers:header})
  }
  listActive(token): Observable <any>{
    let parametros = 'token='+token;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-erp/cellar/listActive',parametros,{headers:header})
  }
  new(token,objInventory): Observable <any>{
    let json = JSON.stringify(objInventory);
    let parametros = 'token='+token+'&json='+json;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-erp/cellar/new',parametros,{headers:header})
  }
  updated(token,objInventory): Observable <any>{
    let json = JSON.stringify(objInventory);
    let parametros = 'token='+token+'&json='+json;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-erp/cellar/updated',parametros,{headers:header})
  }
}
