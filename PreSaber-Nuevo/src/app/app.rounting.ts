import {ModuleWithProviders} from "@angular/core";
import {Routes, RouterModule} from "@angular/router";
import {LoginComponent} from "./components/login/login.component";
import {ValidarPaginaComponent} from "./components/validar-pagina/validar-pagina.component";
import {HomeAdministradorSistemasComponent} from "./components/homeRole/home-administrador-sistemas/home-administrador-sistemas.component";
import {NewUserComponent} from "./components/security/new-user/new-user.component";
import {NewMenuComponent} from "./components/security/new-menu/new-menu.component";
import {NewRolComponent} from "./components/security/new-rol/new-rol.component";
import {ManagerMenuComponent} from "./components/security/manager-menu/manager-menu.component";
import {NewGroupComponent} from "./components/security/new-group/new-group.component";


const appRoutes: Routes = [

  {path: '', component: ValidarPaginaComponent, pathMatch: 'full'},
  //Rutes security
  {path: 'administradorSistemas/security/user/newUser', component: NewUserComponent},
  {path: 'administradorSistemas/security/user/newRol', component: NewRolComponent},
  {path: 'administradorSistemas/security/user/newMenu', component: NewMenuComponent},
  {path: 'administradorSistemas/security/user/newGroup', component: NewGroupComponent},
  {path: 'administradorSistemas/security/user/managerMenu', component: ManagerMenuComponent},
  //Routes erp

  //Routes academic

  //HomeRole
  {path:'administradorSistemas/Home',component:HomeAdministradorSistemasComponent},

  //Public
  {path: 'login', component: LoginComponent},
  {path: '**', component: ValidarPaginaComponent}

];

export const appRoutingProviders: any[] = [];
export const routing: ModuleWithProviders = RouterModule.forRoot(appRoutes);
