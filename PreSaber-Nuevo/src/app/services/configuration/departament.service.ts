import {Observable} from "rxjs/Rx";
import {Injectable} from "@angular/core";
import {HttpHeaders} from "@angular/common/http";
import {GLOBAL} from "../global";
import {HttpClient} from "@angular/common/http";

@Injectable()

export class DepartamentService{
  public url:string;
  constructor(public _Http: HttpClient){
    this.url = GLOBAL.url;
  }

  listDepartament(token,id): Observable <any>{
    let parametros = 'token='+token+'&id='+id;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-configuration/departaments/list',parametros,{headers:header})
  }
  newDepartament(token,menu): Observable <any>{
    let json = JSON.stringify(menu);
    let parametros = 'token='+token+'&json='+json;
    let header = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    return this._Http.post(this.url+'api-configuration/departaments/new',parametros,{headers:header})
  }

}
