import {Component, OnInit} from '@angular/core';
import {ElementsService} from "../../../services/elements.service";
import {CountryService} from "../../../services/configuration/country.service";
import {Co_countries} from "../../../models/configuration/co_countries";
import {Co_departments} from "../../../models/configuration/co_departments";
import {Co_cities} from "../../../models/configuration/co_cities";
import {DepartamentService} from "../../../services/configuration/departament.service";
import {CityService} from "../../../services/configuration/city.service";

@Component({
  selector: 'app-new-city',
  templateUrl: './new-city.component.html',
  styleUrls: ['./new-city.component.scss'],
  providers: [ElementsService, CountryService, DepartamentService, CityService]
})
export class NewCityComponent implements OnInit {
  public listCountry: Array<Co_countries>;
  public token: any;
  public objCountry: Co_countries;
  public objDepartament: Co_departments;
  public objCity: Co_cities;
  public listDepartament: Array<Co_departments>;
  public listCities: Array<Co_cities>;

  constructor(private _ElementService: ElementsService,
              private _CountryService: CountryService,
              private _DepartamentService: DepartamentService,
              private _CityService: CityService) {
    this.token = localStorage.getItem('token');
    this.objCountry = new Co_countries('', '', '', '000', '', '');
    this.objDepartament = new Co_departments('', '', '', '', '000', '', '');
    this.objCity = new Co_cities('', '', '', '', '000', '', '');
  }

  ngOnInit() {
    this._ElementService.pi_poValidarUsuario('NewCityComponent');
    this._ElementService.pi_poLoader(false);
    this.listCountryFunction();
  }

  listCountryFunction() {
    this._ElementService.pi_poLoader(true);
    this._CountryService.listCountry(this.token).subscribe(
      respuesta => {
        this._ElementService.pi_poValidarCodigo(respuesta);
        if (respuesta.status == 'success') {
          if (respuesta.data != 0){
            this.listCountry = respuesta.data;
            this._ElementService.pi_poAlertaSuccess(respuesta.msg, respuesta.code);
            this._ElementService.pi_poLoader(false);
          }else{
            this.listCountry = [];
            this._ElementService.pi_poLoader(false);
          }
        } else {
          this._ElementService.pi_poVentanaAlertaWarning(respuesta.code, respuesta.msg);
          this._ElementService.pi_poLoader(false)
        }
      }, error2 => {
        this._ElementService.pi_poLoader(false)
      }
    )
  }

  newCountry() {
    if (this.objCountry.co_country_description.trim() != '') {
      if (this.objCountry.co_country_code.trim() != '') {
        this._ElementService.pi_poLoader(true);
        this._CountryService.newCountry(this.token, this.objCountry).subscribe(
          respuesta => {
            this._ElementService.pi_poValidarCodigo(respuesta);
            if (respuesta.status == 'success') {
              this.listCountryFunction();
              this._ElementService.pi_poAlertaSuccess(respuesta.msg, respuesta.code);
              this.objCountry = new Co_countries('', '', '', '000', '', '');
              this._ElementService.pi_poLoader(false);
            } else {
              this._ElementService.pi_poVentanaAlertaWarning(respuesta.code, respuesta.msg);
              this._ElementService.pi_poLoader(false);
            }
          }, error2 => {
            this._ElementService.pi_poLoader(false);
          }
        )
      } else {
        this._ElementService.pi_poAlertaError('Lo sentimos, el codigo es requerida', '1000');
      }
    } else {
      this._ElementService.pi_poAlertaError('Lo sentimos, la descripcion es requerida', '1000');
    }
  }

  reset() {
    this.objCountry = new Co_countries('', '', '', '000', '', '');
    this.objDepartament = new Co_departments('', '', '',
      '', '000', '', '');
    this.objCity = new Co_cities('', '', '', '', '000', '', '');
    this.listCountryFunction();
  }

  listDeparmentFunction() {
    if (this.objCountry.co_country_id != '') {
      this._ElementService.pi_poLoader(true);
      this._DepartamentService.listDepartament(this.token, this.objCountry.co_country_id).subscribe(
        respuesta => {
          this._ElementService.pi_poValidarCodigo(respuesta);
          if (respuesta.status == 'success') {
            if (respuesta.data !=0)
            {
              this.listDepartament = respuesta.data;
              this._ElementService.pi_poLoader(false);
            }else{
              this.listDepartament = [];
              this._ElementService.pi_poLoader(false);
            }

          } else {
            this._ElementService.pi_poVentanaAlertaWarning(respuesta.code, respuesta.msg);
            this._ElementService.pi_poLoader(false);
          }
        }, error2 => {

        }
      )
    } else {
      this.listDepartament = [];
      this.listCities = [];
    }

  }

  newDepartament() {
    if (this.objDepartament.co_department_description.trim() != '') {
      if (this.objDepartament.co_department_code.trim() != '') {
        this._ElementService.pi_poLoader(true);
        this.objDepartament.co_country_id_fk_departments = this.objCountry.co_country_id;
        this._DepartamentService.newDepartament(this.token, this.objDepartament).subscribe(
          respuesta => {
            this._ElementService.pi_poValidarCodigo(respuesta);
            if (respuesta.status == 'success') {
              this.listDeparmentFunction();
              this._ElementService.pi_poAlertaSuccess(respuesta.msg, respuesta.code);
              this.objDepartament = new Co_departments('', '', '',
                '', '000', '', '');
              this._ElementService.pi_poLoader(false);
            } else {
              this._ElementService.pi_poVentanaAlertaWarning(respuesta.code, respuesta.msg);
              this._ElementService.pi_poLoader(false);
            }
          }, error2 => {
            this._ElementService.pi_poLoader(false);
          }
        )
      } else {
        this._ElementService.pi_poAlertaError('Lo sentimos, el codigo es requerida', '1000');
      }
    } else {
      this._ElementService.pi_poAlertaError('Lo sentimos, la descripcion es requerida', '1000');
    }
  }

  newCity() {
    if (this.objCity.co_citie_description.trim() != '') {
      if (this.objCity.co_citie_code.trim() != '') {
        this._ElementService.pi_poLoader(true);
        this.objCity.co_department_id_fk_cities = this.objDepartament.co_department_id
        this._CityService.newCity(this.token, this.objCity).subscribe(
          respuesta => {
            this._ElementService.pi_poValidarCodigo(respuesta);
            if (respuesta.status == 'success') {
              this.listCityFunction();
              this._ElementService.pi_poAlertaSuccess(respuesta.msg, respuesta.code);
              this.objCity = new Co_cities('', '', '', '', '000', '', '');
              this._ElementService.pi_poLoader(false);
            } else {
              this._ElementService.pi_poVentanaAlertaWarning(respuesta.code, respuesta.msg);
              this._ElementService.pi_poLoader(false);
            }
          }, error2 => {
            this._ElementService.pi_poLoader(false);
          }
        )
      } else {
        this._ElementService.pi_poAlertaError('Lo sentimos, el codigo es requerida', '1000');
      }
    } else {
      this._ElementService.pi_poAlertaError('Lo sentimos, la descripcion es requerida', '1000');
    }
  }

  listCityFunction() {
    if (this.objDepartament.co_department_id != '') {
      this._ElementService.pi_poLoader(true);
      this._CityService.listCity(this.token, this.objDepartament.co_department_id).subscribe(
        respuesta => {
          this._ElementService.pi_poValidarCodigo(respuesta);
          if (respuesta.status == 'success') {
            if (respuesta.data != 0) {
              this.listCities = respuesta.data;
              this._ElementService.pi_poLoader(false);
            } else {
              this.listCities = [];
              this._ElementService.pi_poLoader(false);
            }
          } else {
            this._ElementService.pi_poVentanaAlertaWarning(respuesta.code, respuesta.msg);
            this._ElementService.pi_poLoader(false);
          }
        }, error2 => {

        }
      )
    } else {
      this.listCities = [];
    }
  }
}
