import {Observable} from "rxjs/Rx";
import {Injectable} from "@angular/core";
import {HttpHeaders} from "@angular/common/http";
import {GLOBAL} from "../global";
import {HttpClient} from "@angular/common/http";

@Injectable()

export class InventoryTypeService{
  public url:string;
  constructor(public _Http: HttpClient){
    this.url = GLOBAL.url;
  }

  list(token): Observable <any>{
    let parametros = 'token='+token;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-erp/inventoryType/list',parametros,{headers:header})
  }
  new(token,objInventoryCategory): Observable <any>{
    let json = JSON.stringify(objInventoryCategory);
    let parametros = 'token='+token+'&json='+json;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-erp/inventoryType/new',parametros,{headers:header})
  }
  updated(token,objInventoryCategory): Observable <any>{
    let json = JSON.stringify(objInventoryCategory);
    let parametros = 'token='+token+'&json='+json;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-erp/inventoryType/updated',parametros,{headers:header})
  }
}
