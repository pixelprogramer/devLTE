import {Observable} from "rxjs/Rx";
import {Injectable} from "@angular/core";
import {HttpHeaders} from "@angular/common/http";
import {GLOBAL} from "../global";
import {HttpClient} from "@angular/common/http";

@Injectable()

export class ProductTypeService{
  public url:string;
  constructor(public _Http: HttpClient){
    this.url = GLOBAL.url;
  }

  list(token): Observable <any>{
    let parametros = 'token='+token;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-erp/productType/list',parametros,{headers:header})
  }
  listActive(token): Observable <any>{
    let parametros = 'token='+token;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-erp/productType/listActive',parametros,{headers:header})
  }
  new(token,objProductType): Observable <any>{
    let json = JSON.stringify(objProductType);
    let parametros = 'token='+token+'&json='+json;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-erp/productType/new',parametros,{headers:header})
  }
  updated(token,objProductType): Observable <any>{
    let json = JSON.stringify(objProductType);
    let parametros = 'token='+token+'&json='+json;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-erp/productType/updated',parametros,{headers:header})
  }
}
