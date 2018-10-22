import { Component, OnInit } from '@angular/core';
import {ElementsService} from "../../../services/elements.service";

@Component({
  selector: 'app-home-administrador-sistemas',
  templateUrl: './home-administrador-sistemas.component.html',
  styleUrls: ['./home-administrador-sistemas.component.scss'],
  providers: [ElementsService]
})
export class HomeAdministradorSistemasComponent implements OnInit {

  position = "top-right";
  constructor(private _ElementService:ElementsService) { }

  ngOnInit() {
    this._ElementService.pi_poValidarUsuario('HomeAdministradorSistemasComponent');
  }

}
