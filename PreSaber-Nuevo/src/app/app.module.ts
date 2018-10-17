import {BrowserModule} from '@angular/platform-browser';
import {NgModule} from '@angular/core';
import {SharedModule} from './shared/shared.module';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {routing, appRoutingProviders} from "./app.rounting";
import {FormsModule} from "@angular/forms";
import {HttpClientModule} from "@angular/common/http";
import {AppComponent} from './app.component';
import {CKEditorModule} from "ng2-ckeditor";
import {SafeHtmlPipe} from "./services/tanfromarHtml";
import {LoginComponent} from './components/login/login.component';
import {ValidarPaginaComponent} from "./components/validar-pagina/validar-pagina.component";
import {ServiceWorkerModule} from '@angular/service-worker';
import {environment} from '../environments/environment';
import {CalendarModule, DateAdapter} from 'angular-calendar';
import {adapterFactory} from 'angular-calendar/date-adapters/date-fns';
import { FlatpickrModule } from 'angularx-flatpickr';
import { HomeAdministradorSistemasComponent } from './components/homeRole/home-administrador-sistemas/home-administrador-sistemas.component';
import { NewUserComponent } from './components/security/new-user/new-user.component';
import { NewMenuComponent } from './components/security/new-menu/new-menu.component';
import { NewRolComponent } from './components/security/new-rol/new-rol.component';
import { ManagerMenuComponent } from './components/security/manager-menu/manager-menu.component';
import { NewGroupComponent } from './components/security/new-group/new-group.component';

@NgModule({
  declarations: [
  HomeAdministradorSistemasComponent,
  NewUserComponent,
  NewMenuComponent,
  NewRolComponent,
  ManagerMenuComponent,
  NewGroupComponent],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    SharedModule,
    routing,
    FormsModule,
    HttpClientModule,
    CKEditorModule,
    FlatpickrModule.forRoot(),
    CalendarModule.forRoot({
      provide: DateAdapter,
      useFactory: adapterFactory
    }),
    ServiceWorkerModule.register('ngsw-worker.js', {enabled: environment.production}),

  ],
  providers: [appRoutingProviders],
  bootstrap: [AppComponent]
})
export class AppModule {
}
